<?php

class ShowDeliveryBill extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const CUSTOMER_ID = "customer_id";
    const DELIVERY_ID = "delivery_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
        if (!isset($_POST[self::CUSTOMER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::CUSTOMER_ID);
        }
        if (!isset($_POST[self::DELIVERY_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DELIVERY_ID);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getDeliveryBillDao()
            ->getDeliveryBill($_POST[self::DRIVER_ID],$_POST[self::CUSTOMER_ID],$_POST[self::DELIVERY_ID]);

        $deliver = [];
        /** @var DeliveryBillEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                DeliveryBillTableSchema::ID => $Delivery->getId(),
                DeliveryBillTableSchema::DRIVER_ID => $Delivery->getDeliveryId(),
                DeliveryBillTableSchema::CUSTOMER_ID => $Delivery->getCustomerId(),
                DeliveryBillTableSchema::DELIVERY_ID => $Delivery->getDeliveryId(),
                DeliveryBillTableSchema::MILES => $Delivery->getMiles(),
                DeliveryBillTableSchema::PAYMENT => $Delivery->getPayment(),
                DeliveryBillTableSchema::CREATED_AT => $Delivery->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'driver_bill' => $deliver
        ]);
    }
}
