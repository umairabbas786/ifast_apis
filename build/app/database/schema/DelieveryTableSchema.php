<?php

class DelieveryTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const CUSTOMER_ID = "customer_id";
    const DRIVER_ID = "driver_id";
    const ITEM_NAMES = "item_names";
    const DESCRIPTION = "description";
    const PICKUP_LOCATION = "pickup_location";
    const DELIVERY_DESTINATION = "delivery_destination";
    const DATE_OF_DELIVERY = "date_of_delivery";
    const PICKUP_TIME = "pickup_time";
    const VEHICLE_TYPE = "vehicle_type";
    const ITEMS_WEIGHT = "items_weight";
    const INSTRUCTIONS = "instructions";
    const PENDING = "pending";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(DelieveryEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::CUSTOMER_ID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::ITEM_NAMES . " VARCHAR(500) NOT NULL,
            " . self::DESCRIPTION . " VARCHAR(50) NOT NULL,
            " . self::PICKUP_LOCATION . " VARCHAR(150) NOT NULL,
            " . self::DELIVERY_DESTINATION . " VARCHAR(150) NOT NULL,
            " . self::DATE_OF_DELIVERY . " VARCHAR(50) NOT NULL,
            " . self::PICKUP_TIME . " VARCHAR(50) NOT NULL,
            " . self::VEHICLE_TYPE . " VARCHAR(170) NOT NULL,
            " . self::ITEMS_WEIGHT . " VARCHAR(170) NOT NULL,
            " . self::INSTRUCTIONS . " VARCHAR(170) NOT NULL,
            " . self::PENDING . " VARCHAR(5) NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
