<?php

class CustomerDepositTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const CUSTOMER_ID = "customer_id";
    const AMOUNT = "amount";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(CustomerDepositEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::CUSTOMER_ID . " VARCHAR(50) NOT NULL,
            " . self::AMOUNT . " VARCHAR(170) NOT NULL,
            " . self::STATUS . " INT NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
