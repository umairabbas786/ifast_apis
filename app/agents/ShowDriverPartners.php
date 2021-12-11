<?php

class ShowDriverPartners extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getDriverPartnerDao()
            ->getDriverPartnerWithDriverId($_POST[self::DRIVER_ID]);

        $deliver = [];
        /** @var DriverPartnerEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                DriverPartnerTableSchema::PARTNER_ID => $Delivery->getPartnerId(),
                DriverPartnerTableSchema::PARTNER_TYPE => $Delivery->getPartnerType(),
                DriverPartnerTableSchema::CREATED_AT => $Delivery->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'driver_partners' => $deliver
        ]);
    }
}
