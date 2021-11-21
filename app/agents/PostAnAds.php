<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class PostAnAds extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const DRIVER_NAME = "driver_name";
    const LOCATION = "location";
    const AVAILABILITY_STATUS = "availability_status";
    const VEHICLE_TYPE = "vehicle_type";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::DRIVER_NAME,
            self::LOCATION,
            self::AVAILABILITY_STATUS,
            self::VEHICLE_TYPE
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $Ads = new AdsEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $_POST[self::DRIVER_NAME],
            $_POST[self::LOCATION],
            $_POST[self::VEHICLE_TYPE],
            $registration_time,
            $registration_time,
            $_POST[self::AVAILABILITY_STATUS],
            false
        );

        $Ads = $this->getAppDB()->getAdsDao()->insertAds($Ads);

        if($Ads === null){
            $this->killAsFailure([
                "failed_to_post_an_ads" => true
            ]);
        }

        $this->resSendOK([
            'posted_ad'=>[
                AdsTableSchema::ID => $Ads->getId(),
                AdsTableSchema::DRIVER_ID => $Ads->getDriverId(),
                AdsTableSchema::DRIVER_NAME => $Ads->getDriverName(),
                AdsTableSchema::LOCATION => $Ads->getLocation(),
                AdsTableSchema::AVAILABILITY_STATUS => $Ads->isAvailabilityStatus(),
                AdsTableSchema::VEHICLE_TYPE => $Ads->getVehicleType(),
                AdsTableSchema::STATUS => $Ads->isStatus(),
                AdsTableSchema::CREATED_AT => $Ads->getCreatedAt(),
                AdsTableSchema::UPDATED_AT => $Ads->getUpdatedAt()
            ]
        ]);
    }
}
