<?php


class DelieveryFactory {
    /**
     * @param string[]|null|false $result
     * @return DelieveryEntity
     */
    public static function mapFromDatabaseResult($result): DelieveryEntity {
        $entity = new DelieveryEntity(
            $result[DelieveryTableSchema::UID],
            $result[DelieveryTableSchema::CUSTOMER_ID],
            $result[DelieveryTableSchema::DRIVER_ID],
            $result[DelieveryTableSchema::ITEM_NAMES],
            $result[DelieveryTableSchema::DESCRIPTION],
            $result[DelieveryTableSchema::PICKUP_LOCATION],
            $result[DelieveryTableSchema::DELIVERY_DESTINATION],
            $result[DelieveryTableSchema::DATE_OF_DELIVERY],
            $result[DelieveryTableSchema::PICKUP_TIME],
            $result[DelieveryTableSchema::VEHICLE_TYPE],
            $result[DelieveryTableSchema::ITEMS_WEIGHT],
            $result[DelieveryTableSchema::INSTRUCTIONS],
            $result[DelieveryTableSchema::CREATED_AT],
            $result[DelieveryTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DelieveryTableSchema::ID]);
        $entity->setPending(((int) $result[DelieveryTableSchema::PENDING]) === 1);
        $entity->setStatus(((int) $result[DelieveryTableSchema::STATUS]) === 1);
        return $entity;
    }
}
