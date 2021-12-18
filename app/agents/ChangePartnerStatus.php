<?php

class ChangePartnerStatus extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const PARTNER_ID = "partner_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $driver = $this->getAppDB()->getDriverPartnerDao()->getDriverPartnerWithDriverIdAndPartnerId($_POST[self::DRIVER_ID],$_POST[self::PARTNER_ID]);
        if($driver === null) {
            $this->killAsFailure([
                'unable_to_find_partner' => true
            ]);
        }
        if($driver->isStatus() === true){
            $driver->setStatus(false);
        }
        else{
            $driver->setStatus(true);
        }
        $driver = $this->getAppDB()->getDriverPartnerDao()->updateDriverPartner($driver);
        if($driver === null) {
            $this->killAsFailure([
                'failed_to_change_driver_partner_status' => true
            ]);
        }

        $this->resSendOK([
            'Driver_partner_status'=> $driver->isStatus()
        ]);
    }
}
