<?php

class DeliveryBillTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const DRIVER_ID = "driver_id";
    const CUSTOMER_ID = "customer_id";
    const DELIVERY_ID = "delivery_id";
    const MILES = "miles";
    const PAYMENT = "payment";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(DeliveryBillEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::DRIVER_ID . " VARCHAR(50) NOT NULL,
            " . self::CUSTOMER_ID . " VARCHAR(50) NOT NULL,
            " . self::DELIVERY_ID . " VARCHAR(50) NOT NULL,
            " . self::MILES . " VARCHAR(170) NOT NULL,
            " . self::PAYMENT . " VARCHAR(170) NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
