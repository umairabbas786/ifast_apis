<?php

class AdsTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const DRIVER_ID = "driver_id";
    const DRIVER_NAME = "driver_name";
    const LOCATION = "location";
    const AVAILABILITY_STATUS = "availability_status";
    const VEHICLE_TYPE = "vehicle_type";
    const REGISTERED_AS = "registered_as";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(AdsEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_NAME . " VARCHAR(50) NOT NULL,
            " . self::LOCATION . " VARCHAR(50) NOT NULL,
            " . self::AVAILABILITY_STATUS . " INT NOT NULL,
            " . self::VEHICLE_TYPE . " VARCHAR(150) NOT NULL,
            " . self::REGISTERED_AS . " VARCHAR(5) NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
