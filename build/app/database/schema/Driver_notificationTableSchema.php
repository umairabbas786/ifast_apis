<?php

class Driver_notificationTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const DRIVER_ID = "driver_id";
    const MSG = "msg";
    const STATE = "state";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(Driver_notificationEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::MSG . " VARCHAR(50) NOT NULL,
            " . self::STATE . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
