<?php


class CustomerWalletFactory {
    /**
     * @param string[]|null|false $result
     * @return CustomerWalletEntity
     */
    public static function mapFromDatabaseResult($result): CustomerWalletEntity {
        $entity = new CustomerWalletEntity(
            $result[CustomerWalletTableSchema::UID],
            $result[CustomerWalletTableSchema::CUSTOMER_ID],
            $result[CustomerWalletTableSchema::CREATED_AT],
            $result[CustomerWalletTableSchema::UPDATED_AT]
        );
        $entity->setId($result[CustomerWalletTableSchema::ID]);
        $entity->setBalance((float) $result[CustomerWalletTableSchema::BALANCE]);
        return $entity;
    }
}
