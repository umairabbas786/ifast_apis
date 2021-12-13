<?php

class CustomerConfirmDeliveryRequest extends ElectroApi {

    const DELIVERY_ID = "delivery_id";

    protected function onAssemble() {
        $required_fields = [
            self::DELIVERY_ID
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $deliveries = $this->getAppDB()->getConfirmDeliveryDao()->getConfirmDeliveryWithDeliveryID($_POST[self::DELIVERY_ID]);

        if($deliveries === null){
            $this->killAsFailure([
                "delivery_not_confirmed_yet" => true
            ]);
        }

        $deliver = [];
        /** @var ConfirmDeliveryEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                ConfirmDeliveryTableSchema::ID => $Delivery->getId(),
                ConfirmDeliveryTableSchema::DELIVERY_ID => $Delivery->getDeliveryId(),
                ConfirmDeliveryTableSchema::CUSTOMER_ID => $Delivery->getCustomerId(),
                ConfirmDeliveryTableSchema::DRIVER_ID => $Delivery->getDriverId(),
                ConfirmDeliveryTableSchema::LOCATION => $Delivery->getLocation(),
                ConfirmDeliveryTableSchema::NUMBER_PLATE => $this->createLinkForDriverImage($Delivery->getNumberPlate()),
                ConfirmDeliveryTableSchema::FACE => $this->createLinkForDriverImage($Delivery->getFace()),
                ConfirmDeliveryTableSchema::BEFORE_ITEMS => $this->createLinkForDriverImage($Delivery->getBeforeItems()),
                ConfirmDeliveryTableSchema::AFTER_ITEMS => $this->createLinkForDriverImage($Delivery->getAfterItems()),
                ConfirmDeliveryTableSchema::CONFIRMED => $Delivery->getConfirmed(),
                ConfirmDeliveryTableSchema::CREATED_AT => $Delivery->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'confirm_delivery_request'=> $deliver
        ]);
    }
}
