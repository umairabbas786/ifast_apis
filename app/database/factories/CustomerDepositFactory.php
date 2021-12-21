<?php


class CustomerDepositFactory {
    /**
     * @param string[]|null|false $result
     * @return CustomerDepositEntity
     */
    public static function mapFromDatabaseResult($result): CustomerDepositEntity {
        $entity = new CustomerDepositEntity(
            $result[CustomerDepositTableSchema::UID],
            $result[CustomerDepositTableSchema::CUSTOMER_ID],
            $result[CustomerDepositTableSchema::CREATED_AT],
            $result[CustomerDepositTableSchema::UPDATED_AT]
        );
        $entity->setId($result[CustomerDepositTableSchema::ID]);
        $entity->setAmount((float) $result[CustomerDepositTableSchema::AMOUNT]);
        $entity->setStatus((int) $result[CustomerDepositTableSchema::STATUS]);
        return $entity;
    }
}
