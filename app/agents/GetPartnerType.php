<?php

class GetPartnerType extends ElectroApi {

    const PARTNER_ID = "partner_id";

    protected function onAssemble() {
        $required_fields = [
            self::PARTNER_ID
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $ad =[];
        $posted_ads = $this->getAppDB()->getAdsDao()->getAdsWithDriverID($_POST[self::PARTNER_ID]);
        /** @var AdsEntity $posted_ad */
        foreach($posted_ads as $posted_ad){
            array_push($ad, [
                AdsTableSchema::REGISTERED_AS => $posted_ad->getRegisteredAs()
            ]);
        }

        $this->resSendOK([
            'partner_type'=> $ad
        ]);
    }
}
