<?php


class DriverStatisticsFactory {
    /**
     * @param string[]|null|false $result
     * @return DriverStatisticsEntity
     */
    public static function mapFromDatabaseResult($result): DriverStatisticsEntity {
        $entity = new DriverStatisticsEntity(
            $result[DriverStatisticsTableSchema::UID],
            $result[DriverStatisticsTableSchema::DRIVER_ID],
            $result[DriverStatisticsTableSchema::CREATED_AT],
            $result[DriverStatisticsTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DriverStatisticsTableSchema::ID]);
        $entity->setCompletedDeliveries((int) $result[DriverStatisticsTableSchema::COMPLETED_DELIVERIES]);
        $entity->setDriverLevel((int) $result[DriverStatisticsTableSchema::DRIVER_LEVEL]);
        $entity->setSuccessRating((float) $result[DriverStatisticsTableSchema::SUCCESS_RATING]);
        return $entity;
    }
}
