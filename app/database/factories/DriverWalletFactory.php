<?php


class DriverWalletFactory {
    /**
     * @param string[]|null|false $result
     * @return DriverWalletEntity
     */
    public static function mapFromDatabaseResult($result): DriverWalletEntity {
        $entity = new DriverWalletEntity(
            $result[DriverWalletTableSchema::UID],
            $result[DriverWalletTableSchema::DRIVER_ID],
            $result[DriverWalletTableSchema::CREATED_AT],
            $result[DriverWalletTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DriverWalletTableSchema::ID]);
        $entity->setBalance((float) $result[DriverWalletTableSchema::BALANCE]);
        return $entity;
    }
}
