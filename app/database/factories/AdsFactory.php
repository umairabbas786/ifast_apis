<?php


class AdsFactory {
    /**
     * @param string[]|null|false $result
     * @return AdsEntity
     */
    public static function mapFromDatabaseResult($result): AdsEntity {
        $entity = new AdsEntity(
            $result[AdsTableSchema::UID],
            $result[AdsTableSchema::DRIVER_ID],
            $result[AdsTableSchema::DRIVER_NAME],
            $result[AdsTableSchema::LOCATION],
            $result[AdsTableSchema::VEHICLE_TYPE],
            $result[AdsTableSchema::REGISTERED_AS],
            $result[AdsTableSchema::CREATED_AT],
            $result[AdsTableSchema::UPDATED_AT]
        );
        $entity->setId($result[AdsTableSchema::ID]);
        $entity->setAvailabilityStatus(((int) $result[AdsTableSchema::AVAILABILITY_STATUS]) === 1);
        $entity->setStatus(((int) $result[AdsTableSchema::STATUS]) === 1);
        return $entity;
    }
}
