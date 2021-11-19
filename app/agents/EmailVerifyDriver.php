<?php

class EmailVerifyDriver extends ElectroApi {

    const EMAIL = "email";
    const EMAIL_CODE = "pin_code";

    protected function onAssemble() {
        if (!isset($_POST[self::EMAIL_CODE])) {
            $this->killAsBadRequestWithMissingParamException(self::EMAIL_CODE);
        }
        if (!isset($_POST[self::EMAIL])) {
            $this->killAsBadRequestWithMissingParamException(self::EMAIL);
        }
    }

    protected function onDevise() {
        $driver = $this->getAppDB()->getDriverDao()->getDriverWithEmail($_POST[self::EMAIL]);

        if ($driver->getEmailCode() !== $_POST[self::EMAIL_CODE]) {
            $this->killAsFailure([
                'invalid_verification_code' => true
            ]);
        }
        else{
            $driver->setEmailVerified(true);
            $driver = $this->getAppDB()->getDriverDao()->updateDriver($driver);
            if($driver === null){
                $this->killAsFailure([
                    'failed_to_update_email_status' => true
                ]);
            }
        }

        $this->resSendOK([
            'email_verified'=> true
        ]);
    }
}
