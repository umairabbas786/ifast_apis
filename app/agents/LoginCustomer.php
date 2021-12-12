<?php

class LoginCustomer extends ElectroApi {

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
        $customer = $this->getAppDB()->getRegisterCustomerDao()->getRegisterCustomerWithEmail($_POST[self::EMAIL]);

        if ($customer === null) {
            $this->killAsFailure([
                'no_customer_found' => true
            ]);
        }

        if ($customer->isAccountVerified() !== true) {
            $this->killAsFailure([
                'customer_otp_not_verified' => true
            ]);
        }

        if($customer->getPassword() !== $_POST[self::PASSWORD]){
            $this->killAsFailure([
                'wrong_password' => true
            ]);
        }

        $this->resSendOK([
            'customer'=>[
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
