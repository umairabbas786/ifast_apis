<?php

class ChangeDriverAvailabilityStatus extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $driver = $this->getAppDB()->getDriverDao()->getDriverWithId($_POST[self::DRIVER_ID]);
        if($driver->isStatus() === true){
            $driver->setStatus(false);
        }
        else{
            $driver->setStatus(true);
        }
        $driver = $this->getAppDB()->getDriverDao()->updateDriver($driver);
        if($driver === null) {
            $this->killAsFailure([
                'failed_to_change_driver_availability_status' => true
            ]);
        }

        $this->resSendOK([
            'Driver_status'=> $driver->isStatus()
        ]);
    }
}
