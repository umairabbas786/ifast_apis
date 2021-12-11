<?php


class ConfirmDeliveryFactory {
    /**
     * @param string[]|null|false $result
     * @return ConfirmDeliveryEntity
     */
    public static function mapFromDatabaseResult($result): ConfirmDeliveryEntity {
        $entity = new ConfirmDeliveryEntity(
            $result[ConfirmDeliveryTableSchema::UID],
            $result[ConfirmDeliveryTableSchema::DELIVERY_ID],
            $result[ConfirmDeliveryTableSchema::CUSTOMER_ID],
            $result[ConfirmDeliveryTableSchema::DRIVER_ID],
            $result[ConfirmDeliveryTableSchema::LOCATION],
            $result[ConfirmDeliveryTableSchema::NUMBER_PLATE],
            $result[ConfirmDeliveryTableSchema::FACE],
            $result[ConfirmDeliveryTableSchema::BEFORE_ITEMS],
            $result[ConfirmDeliveryTableSchema::AFTER_ITEMS],
            $result[ConfirmDeliveryTableSchema::CONFIRMED],
            $result[ConfirmDeliveryTableSchema::CREATED_AT],
            $result[ConfirmDeliveryTableSchema::UPDATED_AT]
        );
        $entity->setId($result[ConfirmDeliveryTableSchema::ID]);
        $entity->setStatus(((int) $result[ConfirmDeliveryTableSchema::STATUS]) === 1);
        return $entity;
    }
}
