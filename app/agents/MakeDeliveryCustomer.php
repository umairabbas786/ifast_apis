<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class MakeDeliveryCustomer extends ElectroApi {

    const CUSTOMER_ID = "customer_id";
    const DRIVER_ID = "driver_id";
    const ITEM_NAMES = "item_names";
    const DESCRIPTION = "description";
    const PICKUP_LOCATION = "pickup_location";
    const DELIVERY_DESTINATION = "delivery_destination";
    const DATE_OF_DELIVERY = "date_of_delivery";
    const PICKUP_TIME = "pickup_time";
    const VEHICLE_TYPE = "vehicle_type";
    const ITEMS_WEIGHT = "items_weight";
    const INSTRUCTIONS = "instructions";

    protected function onAssemble() {
        $required_fields = [
            self::CUSTOMER_ID,
            self::DRIVER_ID,
            self::ITEM_NAMES,
            self::DESCRIPTION,
            self::PICKUP_LOCATION,
            self::DELIVERY_DESTINATION,
            self::DATE_OF_DELIVERY,
            self::PICKUP_TIME,
            self::VEHICLE_TYPE,
            self::ITEMS_WEIGHT,
            self::INSTRUCTIONS
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $Delivery = new DelieveryEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::CUSTOMER_ID],
            $_POST[self::DRIVER_ID],
            $_POST[self::ITEM_NAMES],
            $_POST[self::DESCRIPTION],
            $_POST[self::PICKUP_LOCATION],
            $_POST[self::DELIVERY_DESTINATION],
            $_POST[self::DATE_OF_DELIVERY],
            $_POST[self::PICKUP_TIME],
            $_POST[self::VEHICLE_TYPE],
            $_POST[self::ITEMS_WEIGHT],
            $_POST[self::INSTRUCTIONS],
            $registration_time,
            $registration_time,
            false,
            false
        );

        $Delivery = $this->getAppDB()->getDelieveryDao()->insertDelievery($Delivery);

        if($Delivery === null){
            $this->killAsFailure([
                "failed_to_make_delivery" => true
            ]);
        }

        $this->resSendOK([
            'make_delivery_success'=>[
                DelieveryTableSchema::ID => $Delivery->getId(),
                DelieveryTableSchema::CUSTOMER_ID => $Delivery->getCustomerId(),
                DelieveryTableSchema::DRIVER_ID => $Delivery->getDriverId(),
                DelieveryTableSchema::ITEM_NAMES => $Delivery->getItemNames(),
                DelieveryTableSchema::DESCRIPTION => $Delivery->getDescription(),
                DelieveryTableSchema::PICKUP_LOCATION => $Delivery->getPickupLocation(),
                DelieveryTableSchema::DELIVERY_DESTINATION => $Delivery->getDeliveryDestination(),
                DelieveryTableSchema::DATE_OF_DELIVERY => $Delivery->getDateOfDelivery(),
                DelieveryTableSchema::PICKUP_TIME => $Delivery->getPickupTime(),
                DelieveryTableSchema::VEHICLE_TYPE => $Delivery->getVehicleType(),
                DelieveryTableSchema::ITEMS_WEIGHT => $Delivery->getItemsWeight(),
                DelieveryTableSchema::INSTRUCTIONS => $Delivery->getInstructions(),
                DelieveryTableSchema::PENDING => $Delivery->isPending(),
                DelieveryTableSchema::STATUS => $Delivery->isStatus(),
                DelieveryTableSchema::CREATED_AT => $Delivery->getCreatedAt(),
                DelieveryTableSchema::UPDATED_AT => $Delivery->getUpdatedAt()
            ]
        ]);
    }
}
