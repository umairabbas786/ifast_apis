<?php

class DeletePostedAds extends ElectroApi {

    const POST_ID = "post_id";

    protected function onAssemble() {
        if (!isset($_POST[self::POST_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::POST_ID);
        }
    }

    protected function onDevise() {
        $ad_delete = $this->getAppDB()->getAdsDao()->deleteAdsWithPostId($_POST[self::POST_ID]);
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
