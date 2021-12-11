<?php

class PostedAds extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $posts = $this->getAppDB()->getAdsDao()
            ->getAdsWithDriverID($_POST[self::DRIVER_ID]);

        if(count($posts) === 0) {
            $this->killAsFailure([
                'no_data_found' => true
            ]);
        }

        $ad = [];

        /** @var AdsEntity $ads */
        foreach ($posts as $ads) {
            array_push($ad, [
                AdsTableSchema::ID => $ads->getId(),
                AdsTableSchema::DRIVER_ID => $ads->getDriverId(),
                AdsTableSchema::DRIVER_NAME => $ads->getDriverName(),
                AdsTableSchema::LOCATION => $ads->getLocation(),
                AdsTableSchema::AVAILABILITY_STATUS => $ads->isAvailabilityStatus(),
                AdsTableSchema::VEHICLE_TYPE => $ads->getVehicleType(),
                AdsTableSchema::REGISTERED_AS => $ads->getRegisteredAs(),
                AdsTableSchema::CREATED_AT => $ads->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'ads_of_driver' => $ad
        ]);
    }
}
