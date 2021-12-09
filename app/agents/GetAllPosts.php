<?php

class GetAllPosts extends ElectroApi {

    protected function onDevise() {
        $posts = $this->getAppDB()->getAdsDao()
            ->getAllAds();

        if($posts === null) {
            $this->killAsFailure([
                'no_data_found' => true
            ]);
        }

        $ad = [];

        /** @var AdsEntity $adds */
        foreach ($posts as $ads) {
            array_push($ad, [
                AdsTableSchema::ID => $ads->getId(),
                AdsTableSchema::DRIVER_NAME => $ads->getDriverName(),
                AdsTableSchema::LOCATION => $ads->getLocation(),
                AdsTableSchema::VEHICLE_TYPE => $ads->getVehicleType(),
                AdsTableSchema::CREATED_AT => $ads->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'ads_of_driver' => $ad
        ]);
    }
}
