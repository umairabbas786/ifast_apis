<?php

class DeleteAccountDriver extends ElectroApi {

    const CUSTOMER_ID = "customer_id";

    protected function onAssemble() {
        if (!isset($_POST[self::CUSTOMER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::CUSTOMER_ID);
        }
    }

    protected function onDevise() {


        $driver_delete = $this->getAppDB()->getRegisterCustomerDao()->deleteRegisterCustomerWithId($_POST[self::CUSTOMER_ID]);
        if($driver_delete === false){
            $this->killAsFailure([
                'unable_to_delete_driver' => true
            ]);
        }

        $this->resSendOK([
            'account_deleted' => true
        ]);
    }
}
