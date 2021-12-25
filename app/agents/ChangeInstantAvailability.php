<?php

class ChangeInstantAvailability extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $driver = $this->getAppDB()->getAdsDao()->getAdsWithDriverIDEntity($_POST[self::DRIVER_ID]);
        if($driver->isAvailabilityStatus() === true){
            $driver->setAvailabilityStatus(false);
        }
        else{
            $driver->setAvailabilityStatus(true);
        }
        $driver = $this->getAppDB()->getAdsDao()->updateAds($driver);
        if($driver === null) {
            $this->killAsFailure([
                'failed_to_change_instant_availability_status' => true
            ]);
        }

        $this->resSendOK([
            'Instant_availability_status'=> $driver->isAvailabilityStatus()
        ]);
    }
}
