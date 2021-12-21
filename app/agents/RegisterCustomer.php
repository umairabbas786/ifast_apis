<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class RegisterCustomer extends ElectroApi {

    const PROFILE_PICTURE = "profile_picture";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const EMAIL = "email";
    const COUNTRY = "country";
    const PASSWORD = "password";
    const VERIFIED = "account_verified";

    protected function onAssemble() {
        $required_fields = [
            self::FIRST_NAME,
            self::LAST_NAME,
            self::EMAIL,
            self::COUNTRY,
            self::PASSWORD,
            self::VERIFIED
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }

        if (!isset($_FILES[self::PROFILE_PICTURE])) {
            $this->killAsBadRequestWithMissingParamException(self::PROFILE_PICTURE);
        }
    }

    protected function onDevise() {
        $profilePictureGeneratedName = "";
        $isProfilePictureImageSaved = ImageUploader::withSrc($_FILES[self::PROFILE_PICTURE]['tmp_name'])
            ->destinationDir($this->getUserAvatarImageDirPath())
            ->generateUniqueName($_FILES[self::PROFILE_PICTURE]['name'])
            ->mapGeneratedName($profilePictureGeneratedName)
            ->compressQuality(75)
            ->save();
        if (!$isProfilePictureImageSaved) {
            $this->killAsFailure([
                "failed_to_save_profile_picture_image" => true
            ]);
        }

        $customerEntity = $this->getAppDB()->getRegisterCustomerDao()->getRegisterCustomerWithEmail($_POST[self::EMAIL]);

        if ($customerEntity !== null) {
            $this->killAsFailure([
                "customer_already_registered" => true
            ]);
        }

        $registration_time = Carbon::now();

        $customer = new RegisterCustomerEntity(
            Uuid::uuid4()->toString(),
            $profilePictureGeneratedName,
            $_POST[self::FIRST_NAME],
            $_POST[self::LAST_NAME],
            $_POST[self::EMAIL],
            $_POST[self::COUNTRY],
            $_POST[self::PASSWORD],
            $registration_time,
            $registration_time,
            $_POST[self::VERIFIED]
        );

        $customer = $this->getAppDB()->getRegisterCustomerDao()->insertRegisterCustomer($customer);

        if ($customer === null) {
            $this->killAsFailure([
                "failed_to_register_customer" => true
            ]);
        }

        $id = $customer->getId();
        $stats = new CustomerWalletEntity(
            Uuid::uuid4()->toString(),
            $id,
            $registration_time,
            $registration_time,
            0.0
        );

        $stats = $this->getAppDB()->getCustomerWalletDao()->insertCustomerWallet($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_driver_wallet" => true
            ]);
        }

        $this->resSendOK([
            'customer' => [
                RegisterCustomerTableSchema::ID => $customer->getId(),
                RegisterCustomerTableSchema::PROFILE_PICTURE => $this->createLinkForUserAvatarImage($customer->getProfilePicture()),
                RegisterCustomerTableSchema::FIRST_NAME => $customer->getFirstName(),
                RegisterCustomerTableSchema::LAST_NAME => $customer->getLastName(),
                RegisterCustomerTableSchema::EMAIL => $customer->getEmail(),
                RegisterCustomerTableSchema::COUNTRY => $customer->getCountry(),
                RegisterCustomerTableSchema::PASSWORD => $customer->getPassword(),
                RegisterCustomerTableSchema::ACCOUNT_VERIFIED => $customer->isAccountVerified(),
                RegisterCustomerTableSchema::CREATED_AT => $customer->getCreatedAt(),
                RegisterCustomerTableSchema::UPDATED_AT => $customer->getUpdatedAt()
            ]
        ]);
    }
}