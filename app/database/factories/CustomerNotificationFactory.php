<?php


class CustomerNotificationFactory {
    /**
     * @param string[]|null|false $result
     * @return CustomerNotificationEntity
     */
    public static function mapFromDatabaseResult($result): CustomerNotificationEntity {
        $entity = new CustomerNotificationEntity(
            $result[CustomerNotificationTableSchema::UID],
            $result[CustomerNotificationTableSchema::CUSTOMER_ID],
            $result[CustomerNotificationTableSchema::MSG],
            $result[CustomerNotificationTableSchema::CREATED_AT],
            $result[CustomerNotificationTableSchema::UPDATED_AT]
        );
        $entity->setId($result[CustomerNotificationTableSchema::ID]);
        $entity->setState(((int) $result[CustomerNotificationTableSchema::STATE]) === 1);
        return $entity;
    }
}
