<?php


class Driver_notificationFactory {
    /**
     * @param string[]|null|false $result
     * @return Driver_notificationEntity
     */
    public static function mapFromDatabaseResult($result): Driver_notificationEntity {
        $entity = new Driver_notificationEntity(
            $result[Driver_notificationTableSchema::UID],
            $result[Driver_notificationTableSchema::DRIVER_ID],
            $result[Driver_notificationTableSchema::MSG],
            $result[Driver_notificationTableSchema::CREATED_AT],
            $result[Driver_notificationTableSchema::UPDATED_AT]
        );
        $entity->setId($result[Driver_notificationTableSchema::ID]);
        $entity->setState(((int) $result[Driver_notificationTableSchema::STATE]) === 1);
        return $entity;
    }
}
