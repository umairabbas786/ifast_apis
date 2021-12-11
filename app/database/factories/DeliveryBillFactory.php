<?php


class DeliveryBillFactory {
    /**
     * @param string[]|null|false $result
     * @return DeliveryBillEntity
     */
    public static function mapFromDatabaseResult($result): DeliveryBillEntity {
        $entity = new DeliveryBillEntity(
            $result[DeliveryBillTableSchema::UID],
            $result[DeliveryBillTableSchema::DRIVER_ID],
            $result[DeliveryBillTableSchema::CUSTOMER_ID],
            $result[DeliveryBillTableSchema::DELIVERY_ID],
            $result[DeliveryBillTableSchema::CREATED_AT],
            $result[DeliveryBillTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DeliveryBillTableSchema::ID]);
        $entity->setMiles((float) $result[DeliveryBillTableSchema::MILES]);
        $entity->setPayment((float) $result[DeliveryBillTableSchema::PAYMENT]);
        $entity->setStatus(((int) $result[DeliveryBillTableSchema::STATUS]) === 1);
        return $entity;
    }
}
