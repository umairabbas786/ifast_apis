<?php

class DeleteAccountDriver extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $driver_delete = $this->getAppDB()->getDriverDao()->deleteDriverWithId($_POST[self::DRIVER_ID]);
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
