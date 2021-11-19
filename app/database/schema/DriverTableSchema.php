<?php

class DriverTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const PROFILE_PICTURE = "profile_picture";
    const FULL_NAME = "full_name";
    const EMAIL = "email";
    const DATE_OF_BIRTH = "date_of_birth";
    const COUNTRY = "country";
    const PASSWORD = "password";
    const PROOF = "proof";
    const EMAIL_CODE = "email_code";
    const EMAIL_VERIFIED = "email_verified";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(DriverEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::PROFILE_PICTURE . " VARCHAR(150) NOT NULL,
            " . self::FULL_NAME . " VARCHAR(50) NOT NULL,
            " . self::EMAIL . " VARCHAR(50) NOT NULL,
            " . self::DATE_OF_BIRTH . " VARCHAR(50) NOT NULL,
            " . self::COUNTRY . " VARCHAR(50) NOT NULL,
            " . self::PASSWORD . " VARCHAR(50) NOT NULL,
            " . self::PROOF . " VARCHAR(150) NOT NULL,
            " . self::EMAIL_CODE . " VARCHAR(50) NOT NULL,
            " . self::EMAIL_VERIFIED . " INT NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
