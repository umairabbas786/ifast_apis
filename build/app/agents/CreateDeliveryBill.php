<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class CreateDeliveryBill extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const CUSTOMER_ID = "customer_id";
    const DELIVERY_ID = "delivery_id";
    const MILES = "total_miles";
    const PAYMENT = "payment";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::CUSTOMER_ID,
            self::DELIVERY_ID,
            self::MILES,
            self::PAYMENT
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $Partner = new DeliveryBillEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $_POST[self::CUSTOMER_ID],
            $_POST[self::DELIVERY_ID],
            $registration_time,
            $registration_time,
            $_POST[self::MILES],
            $_POST[self::PAYMENT],
            false
        );

        $Partner = $this->getAppDB()->getDeliveryBillDao()->insertDeliveryBill($Partner);

        if($Partner === null){
            $this->killAsFailure([
                "failed_to_make_delivery_bill" => true
            ]);
        }

        $this->resSendOK([
            'bill_success'=>[
                DeliveryBillTableSchema::ID => $Partner->getId(),
                DeliveryBillTableSchema::DRIVER_ID => $Partner->getDriverId(),
                DeliveryBillTableSchema::CUSTOMER_ID => $Partner->getCustomerId(),
                DeliveryBillTableSchema::DELIVERY_ID => $Partner->getDeliveryId(),
                DeliveryBillTableSchema::MILES => $Partner->getMiles(),
                DeliveryBillTableSchema::PAYMENT => $Partner->getPayment(),
                DeliveryBillTableSchema::STATUS => $Partner->isStatus(),
                DeliveryBillTableSchema::CREATED_AT => $Partner->getCreatedAt(),
                DeliveryBillTableSchema::UPDATED_AT => $Partner->getUpdatedAt()
            ]
        ]);
    }
}
