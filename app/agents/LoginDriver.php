<?php

class LoginDriver extends ElectroApi {

    const EMAIL = "email";
    const PASSWORD = "password";

    protected function onAssemble() {
        if (!isset($_POST[self::EMAIL])) {
            $this->killAsBadRequestWithMissingParamException(self::EMAIL);
        }
        if (!isset($_POST[self::PASSWORD])) {
            $this->killAsBadRequestWithMissingParamException(self::PASSWORD);
        }
    }

    protected function onDevise() {
        $driver = $this->getAppDB()->getDriverDao()->getDriverWithEmail($_POST[self::EMAIL]);

        if ($driver === null) {
            $this->killAsFailure([
                'no_driver_found' => true
            ]);
        }

        if ($driver->isStatus() !== true) {
            $this->killAsFailure([
                'driver_not_verified_by_admin' => true
            ]);
        }

        if($driver->getPassword() !== $_POST[self::PASSWORD]){
            $this->killAsFailure([
                'wrong_password' => true
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
        ]);
    }
}
