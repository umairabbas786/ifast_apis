<?php

class ShowAllDrivers extends ElectroApi {

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getAdsDao()
            ->getAllAds();

        $deliver = [];
        /** @var AdsEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                AdsTableSchema::DRIVER_ID => $Delivery->getId(),
                AdsTableSchema::DRIVER_NAME => $Delivery->getDriverName(),
                AdsTableSchema::VEHICLE_TYPE => $Delivery->getVehicleType(),
                AdsTableSchema::LOCATION => $Delivery->getLocation(),
                AdsTableSchema::AVAILABILITY_STATUS => $Delivery->isAvailabilityStatus()
            ]);
        }

        $this->resSendOK([
            'drivers' => $deliver
        ]);
    }
}
