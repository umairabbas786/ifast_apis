<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class MakePartnerDriver extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const PARTNER_ID = "partner_id";
    const PARTNER_TYPE = "partner_type";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::PARTNER_ID,
            self::PARTNER_TYPE
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $Partner = new DriverPartnerEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $_POST[self::PARTNER_ID],
            $_POST[self::PARTNER_TYPE],
            $registration_time,
            $registration_time,
            false
        );

        $checkPartner = $this->getAppDB()->getDriverPartnerDao()
            ->getDriverPartnerWithDriverIdAndPartnerId($_POST[self::DRIVER_ID],$_POST[self::PARTNER_ID]);

        if($checkPartner !== null) {
            $this->killAsFailure([
                "partner_already_registered" => true
            ]);
        }

        $deliveries = $this->getAppDB()->getDriverPartnerDao()
            ->getDriverPartnerWithDriverId($_POST[self::DRIVER_ID]);

        /** @var DriverPartnerEntity $delivery */
        foreach($deliveries as $delivery){
            if($delivery->getPartnerType() == $_POST[self::PARTNER_TYPE]){
                $this->killAsFailure([
                    "cant_add_partner_with_same_type" => true
                ]);
            }
        }

        $posted_ads = $this->getAppDB()->getAdsDao()->getAdsWithDriverID($_POST[self::DRIVER_ID]);
        /** @var AdsEntity $posted_ad */
        foreach($posted_ads as $posted_ad){
            if($posted_ad->getRegisteredAs() == $_POST[self::PARTNER_TYPE]){
                $this->killAsFailure([
                    "partnership_error" => true
                ]);
            }
        }

        if(count($deliveries) === 3){
            $this->killAsFailure([
                "driver_can_add_upto_4_partners" => true
            ]);
        }
        $Partner = $this->getAppDB()->getDriverPartnerDao()->insertDriverPartner($Partner);

        if($Partner === null){
            $this->killAsFailure([
                "failed_to_make_partner" => true
            ]);
        }

        $this->resSendOK([
            'partner_success'=>[
                DriverPartnerTableSchema::ID => $Partner->getId(),
                DriverPartnerTableSchema::DRIVER_ID => $Partner->getDriverId(),
                DriverPartnerTableSchema::PARTNER_ID => $Partner->getPartnerId(),
                DriverPartnerTableSchema::PARTNER_TYPE => $Partner->getPartnerType(),
                DriverPartnerTableSchema::STATUS => $Partner->isStatus(),
                DriverPartnerTableSchema::CREATED_AT => $Partner->getCreatedAt(),
                DriverPartnerTableSchema::UPDATED_AT => $Partner->getUpdatedAt()
            ]
        ]);
    }
}