<?php


class DriverFactory {
    /**
     * @param string[]|null|false $result
     * @return DriverEntity
     */
    public static function mapFromDatabaseResult($result): DriverEntity {
        $entity = new DriverEntity(
            $result[DriverTableSchema::UID],
            $result[DriverTableSchema::PROFILE_PICTURE],
            $result[DriverTableSchema::FULL_NAME],
            $result[DriverTableSchema::EMAIL],
            $result[DriverTableSchema::DATE_OF_BIRTH],
            $result[DriverTableSchema::COUNTRY],
            $result[DriverTableSchema::PASSWORD],
            $result[DriverTableSchema::PROOF],
            $result[DriverTableSchema::EMAIL_CODE],
            $result[DriverTableSchema::CREATED_AT],
            $result[DriverTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DriverTableSchema::ID]);
        $entity->setEmailVerified(((int) $result[DriverTableSchema::EMAIL_VERIFIED]) === 1);
        $entity->setStatus(((int) $result[DriverTableSchema::STATUS]) === 1);
        return $entity;
    }
}
