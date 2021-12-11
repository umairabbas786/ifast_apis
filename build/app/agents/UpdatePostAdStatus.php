<?php

class UpdatePostAdStatus extends ElectroApi {

    const ADS_ID = "id";

    protected function onAssemble() {
        if (!isset($_POST[self::ADS_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::ADS_ID);
        }
    }

    protected function onDevise() {
        $ads = $this->getAppDB()->getAdsDao()->getAdsWithId($_POST[self::ADS_ID]);
        if($ads->isAvailabilityStatus() === true){
            $ads->setAvailabilityStatus(false);
        }
        else{
            $ads->setAvailabilityStatus(true);
        }
        $ads = $this->getAppDB()->getAdsDao()->updateAds($ads);
        if($ads === null) {
            $this->killAsFailure([
                'failed_to_update_availability_status' => true
            ]);
        }

        $this->resSendOK([
            'availability_status_changed'=> true
        ]);
    }
}
