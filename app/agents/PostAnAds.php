<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class PostAnAds extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const DRIVER_NAME = "driver_name";
    const LOCATION = "location";
    const AVAILABILITY_STATUS = "availability_status";
    const VEHICLE_TYPE = "vehicle_type";
    const VEHICLE_NUMBER_PLATE = "vehicle_number_plate";
    const REGISTERED_AS = "registered_as";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::DRIVER_NAME,
            self::LOCATION,
            self::AVAILABILITY_STATUS,
            self::VEHICLE_TYPE,
            self::REGISTERED_AS
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
        if (!isset($_FILES[self::VEHICLE_NUMBER_PLATE])) {
            $this->killAsBadRequestWithMissingParamException(self::VEHICLE_NUMBER_PLATE);
        }
    }

    protected function onDevise() {

        $checkAds = $this->getAppDB()->getAdsDao()->getAdsWithDriverID($_POST[self::DRIVER_ID]);

        if(count($checkAds) === 1){
            $this->killAsFailure([
                "you_are_already_been_registered" => true
            ]);
        }

        /** @var AdsEntity $checkAd */
        foreach($checkAds as $checkAd){
            if($checkAd->getVehicleType() == $_POST[self::VEHICLE_TYPE]){
                $this->killAsFailure([
                    "Already_registered_with_this_vehicle" => true
                ]);
            }
        }

        $profilePictureGeneratedName = "";
        $isProfilePictureImageSaved = ImageUploader::withSrc($_FILES[self::VEHICLE_NUMBER_PLATE]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::VEHICLE_NUMBER_PLATE]['name'])
            ->mapGeneratedName($profilePictureGeneratedName)
            ->compressQuality(75)
            ->save();
        if(!$isProfilePictureImageSaved){
            $this->killAsFailure([
                "failed_to_save_profile_picture_image"=> true
            ]);
        }

        $registration_time = Carbon::now();

        $Ads = new AdsEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $_POST[self::DRIVER_NAME],
            $_POST[self::LOCATION],
            $_POST[self::VEHICLE_TYPE],
            $profilePictureGeneratedName,
            $_POST[self::REGISTERED_AS],
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
                AdsTableSchema::VEHICLE_NUMBER_PLATE => $this->createLinkForDriverImage($Ads->getVehicleNumberPlate()),
                AdsTableSchema::REGISTERED_AS => $Ads->getRegisteredAs(),
                AdsTableSchema::STATUS => $Ads->isStatus(),
                AdsTableSchema::CREATED_AT => $Ads->getCreatedAt(),
                AdsTableSchema::UPDATED_AT => $Ads->getUpdatedAt()
            ]
        ]);
    }
}
