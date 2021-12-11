<?php


class DriverPartnerFactory {
    /**
     * @param string[]|null|false $result
     * @return DriverPartnerEntity
     */
    public static function mapFromDatabaseResult($result): DriverPartnerEntity {
        $entity = new DriverPartnerEntity(
            $result[DriverPartnerTableSchema::UID],
            $result[DriverPartnerTableSchema::DRIVER_ID],
            $result[DriverPartnerTableSchema::PARTNER_ID],
            $result[DriverPartnerTableSchema::PARTNER_TYPE],
            $result[DriverPartnerTableSchema::CREATED_AT],
            $result[DriverPartnerTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DriverPartnerTableSchema::ID]);
        $entity->setStatus(((int) $result[DriverPartnerTableSchema::STATUS]) === 1);
        return $entity;
    }
}
