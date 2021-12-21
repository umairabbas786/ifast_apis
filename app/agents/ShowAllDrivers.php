<?php

class ShowAllDrivers extends ElectroApi {

    const VEHICLE_TYPE = "vehicle_type";

    protected function onAssemble() {
        if (!isset($_POST[self::VEHICLE_TYPE])) {
            $this->killAsBadRequestWithMissingParamException(self::VEHICLE_TYPE);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getAdsDao()
            ->getAdsWithVehicleTypeID($_POST[self::VEHICLE_TYPE]);

        $deliver = [];
        /** @var AdsEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                AdsTableSchema::DRIVER_ID => $Delivery->getDriverId(),
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
