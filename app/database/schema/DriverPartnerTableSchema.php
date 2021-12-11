<?php

class DriverPartnerTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const DRIVER_ID = "driver_id";
    const PARTNER_ID = "partner_id";
    const PARTNER_TYPE = "partner_type";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(DriverPartnerEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::PARTNER_ID . " VARCHAR(50) NOT NULL,
            " . self::PARTNER_TYPE . " VARCHAR(150) NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
