<?php

class DriverStatisticsTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const DRIVER_ID = "driver_id";
    const COMPLETED_DELIVERIES = "completed_deliveries";
    const DRIVER_LEVEL = "driver_level";
    const SUCCESS_RATING = "success_rating";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(DriverStatisticsEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::COMPLETED_DELIVERIES . " INT NOT NULL,
            " . self::DRIVER_LEVEL . " INT NOT NULL,
            " . self::SUCCESS_RATING . " VARCHAR(170) NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
