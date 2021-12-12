<?php


class RegisterCustomerFactory {
    /**
     * @param string[]|null|false $result
     * @return RegisterCustomerEntity
     */
    public static function mapFromDatabaseResult($result): RegisterCustomerEntity {
        $entity = new RegisterCustomerEntity(
            $result[RegisterCustomerTableSchema::UID],
            $result[RegisterCustomerTableSchema::PROFILE_PICTURE],
            $result[RegisterCustomerTableSchema::FIRST_NAME],
            $result[RegisterCustomerTableSchema::LAST_NAME],
            $result[RegisterCustomerTableSchema::EMAIL],
            $result[RegisterCustomerTableSchema::COUNTRY],
            $result[RegisterCustomerTableSchema::PASSWORD],
            $result[RegisterCustomerTableSchema::CREATED_AT],
            $result[RegisterCustomerTableSchema::UPDATED_AT]
        );
        $entity->setId($result[RegisterCustomerTableSchema::ID]);
        $entity->setAccountVerified(((int) $result[RegisterCustomerTableSchema::ACCOUNT_VERIFIED]) === 1);
        return $entity;
    }
}
