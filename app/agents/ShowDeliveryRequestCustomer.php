<?php

class ShowDeliveryRequestCustomer extends ElectroApi {

    const CUSTOMER_ID = "customer_id";

    protected function onAssemble() {
        if (!isset($_POST[self::CUSTOMER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::CUSTOMER_ID);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getDelieveryDao()
            ->getDeliveriesWithCustomerID($_POST[self::CUSTOMER_ID]);

        if(count($deliveries) === 0) {
            $this->killAsFailure([
                'no_data_found' => true
            ]);
        }

        $deliver = [];
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
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
                DelieveryTableSchema::PENDING => $Delivery->getPending(),
                DelieveryTableSchema::CREATED_AT => $Delivery->getCreatedAt(),
                DelieveryTableSchema::UPDATED_AT => $Delivery->getUpdatedAt()
            ]);
        }

        $this->resSendOK([
            'delivery_requests' => $deliver
        ]);
    }
}
