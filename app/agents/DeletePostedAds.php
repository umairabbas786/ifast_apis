<?php

class DeletePostedAds extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $posts = $this->getAppDB()->getAdsDao()
            ->getAdsWithDriverID($_POST[self::DRIVER_ID]);

        $ad_delete = $this->getAppDB()->getAdsDao()->deleteAds($posts);
        if($ad_delete === false){
            $this->killAsFailure([
                'unable_to_delete_ad' => true
            ]);
        }

        $this->resSendOK([
            'ad_deleted' => true 
        ]);
    }
}
