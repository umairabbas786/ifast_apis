<?php

class RegisterCustomerTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const PROFILE_PICTURE = "profile_picture";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const EMAIL = "email";
    const COUNTRY = "country";
    const PASSWORD = "password";
    const ACCOUNT_VERIFIED = "account_verified";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(RegisterCustomerEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::PROFILE_PICTURE . " VARCHAR(150) NOT NULL,
            " . self::FIRST_NAME . " VARCHAR(50) NOT NULL,
            " . self::LAST_NAME . " VARCHAR(50) NOT NULL,
            " . self::EMAIL . " VARCHAR(150) NOT NULL,
            " . self::COUNTRY . " VARCHAR(150) NOT NULL,
            " . self::PASSWORD . " VARCHAR(150) NOT NULL,
            " . self::ACCOUNT_VERIFIED . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
