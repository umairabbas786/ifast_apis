<?php

class ConfirmDeliveryTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const DELIVERY_ID = "delivery_id";
    const CUSTOMER_ID = "customer_id";
    const DRIVER_ID = "driver_id";
    const LOCATION = "location";
    const NUMBER_PLATE = "number_plate";
    const FACE = "face";
    const BEFORE_ITEMS = "before_items";
    const AFTER_ITEMS = "after_items";
    const CONFIRMED = "confirmed";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(ConfirmDeliveryEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::DELIVERY_ID . " VARCHAR(50) NOT NULL,
            " . self::CUSTOMER_ID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::LOCATION . " VARCHAR(150) NOT NULL,
            " . self::NUMBER_PLATE . " VARCHAR(150) NOT NULL,
            " . self::FACE . " VARCHAR(150) NOT NULL,
            " . self::BEFORE_ITEMS . " VARCHAR(150) NOT NULL,
            " . self::AFTER_ITEMS . " VARCHAR(150) NOT NULL,
            " . self::CONFIRMED . " VARCHAR(5) NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
