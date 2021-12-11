<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class RegisterDriver extends ElectroApi {

    const PROFILE_PICTURE = "profile_picture";
    const FULL_NAME = "full_name";
    const EMAIL = "email";
    const DATE_OF_BIRTH = "date_of_birth";
    const COUNTRY = "country";
    const PASSWORD = "password";
    const PROOF = "proof";

    protected function onAssemble() {
        $required_fields = [
            self::FULL_NAME,
            self::EMAIL,
            self::DATE_OF_BIRTH,
            self::COUNTRY,
            self::PASSWORD
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }

        if (!isset($_FILES[self::PROFILE_PICTURE])) {
            $this->killAsBadRequestWithMissingParamException(self::PROFILE_PICTURE);
        }

        if (!isset($_FILES[self::PROOF])) {
            $this->killAsBadRequestWithMissingParamException(self::PROOF);
        }
    }

    protected function onDevise() {
        $profilePictureGeneratedName = "";
        $isProfilePictureImageSaved = ImageUploader::withSrc($_FILES[self::PROFILE_PICTURE]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::PROFILE_PICTURE]['name'])
            ->mapGeneratedName($profilePictureGeneratedName)
            ->compressQuality(75)
            ->save();
        if(!$isProfilePictureImageSaved){
            $this->killAsFailure([
                "failed_to_save_profile_picture_image"=> true
            ]);
        }

        $proofGeneratedName = "";
        $isProofImageSaved = ImageUploader::withSrc($_FILES[self::PROOF]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::PROOF]['name'])
            ->mapGeneratedName($proofGeneratedName)
            ->compressQuality(75)
            ->save();

        if(!$isProofImageSaved){
            $this->killAsFailure([
                "failed_to_save_proof_image"=> true
            ]);
        }
        $driverEntity = $this->getAppDB()->getDriverDao()->getDriverWithEmail($_POST[self::EMAIL]);

        if ($driverEntity !== null) {
            $this->killAsFailure([
                "driver_already_registered" => true
            ]);
        }

        $registration_time = Carbon::now();

        $pinCode = bin2hex(openssl_random_pseudo_bytes(3));

        $driver = new DriverEntity(
            Uuid::uuid4()->toString(),
            $profilePictureGeneratedName,
            $_POST[self::FULL_NAME],
            $_POST[self::EMAIL],
            $_POST[self::DATE_OF_BIRTH],
            $_POST[self::COUNTRY],
            $_POST[self::PASSWORD],
            $proofGeneratedName,
            $pinCode,
            $registration_time,
            $registration_time
        );

        $driver = $this->getAppDB()->getDriverDao()->insertDriver($driver);

        if($driver === null){
            $this->killAsFailure([
                "failed_to_register_driver" => true
            ]);
        }

        $id = $driver->getId();
        $stats = new DriverStatisticsEntity(
            Uuid::uuid4()->toString(),
            $id,
            $registration_time,
            $registration_time,
            0,
            0,
            0
        );

        $stats = $this->getAppDB()->getDriverStatisticsDao()->insertDriverStatistics($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_driver_statistics" => true
            ]);
        }

        $stats = new DriverWalletEntity(
            Uuid::uuid4()->toString(),
            $id,
            $registration_time,
            $registration_time,
            0.0
        );

        $stats = $this->getAppDB()->getDriverWalletDao()->insertDriverWallet($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_driver_wallet" => true
            ]);
        }

        $this->resSendOK([
            'driver'=>[
                DriverTableSchema::ID => $driver->getId(),
                DriverTableSchema::PROFILE_PICTURE => $this->createLinkForDriverImage($driver->getProfilePicture()),
                DriverTableSchema::FULL_NAME => $driver->getFullName(),
                DriverTableSchema::EMAIL => $driver->getEmail(),
                DriverTableSchema::DATE_OF_BIRTH => $driver->getDateOfBirth(),
                DriverTableSchema::COUNTRY => $driver->getCountry(),
                DriverTableSchema::PASSWORD => $driver->getPassword(),
                DriverTableSchema::PROOF => $this->createLinkForDriverImage($driver->getProof()),
                DriverTableSchema::EMAIL_VERIFIED => $driver->isEmailVerified(),
                DriverTableSchema::STATUS => $driver->isStatus(),
                DriverTableSchema::CREATED_AT => $driver->getCreatedAt(),
                DriverTableSchema::UPDATED_AT => $driver->getUpdatedAt()
            ]
        ], false);

        $to = $driver->getEmail();
        $subject = 'Email Verification';
        $from = 'ifast@no-reply.com';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h1 style="color:#f40;">Hi '.$driver->getFullName().'!</h1>';
        $message .= '<p style="color:#080;font-size:18px;">Please use the following code to verify your account.</p>';
        $message .= '<h3>'.$pinCode.'</h3>';
        $message .= '</body></html>';

        // Sending email
        mail($to, $subject, $message, $headers);
    }
}
