<?php

class DriverConversationTableSchema extends TableSchema {

    const ID = "id";
    const UID = "uid";
    const SENDER_ID = "sender_id";
    const RECIPIENT_ID = "recipient_id";
    const MESSAGE = "message";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function __construct() { parent::__construct(DriverConversationEntity::TABLE_NAME); }

    public function getBlueprint(): string {
        return "CREATE TABLE IF NOT EXISTS " . $this->getTableName() . "(
            " . self::ID . " INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            " . self::UID . " VARCHAR(50) NOT NULL,
            " . self::SENDER_ID . " VARCHAR(50) NOT NULL,
            " . self::RECIPIENT_ID . " VARCHAR(50) NOT NULL,
            " . self::MESSAGE . " VARCHAR(50) NOT NULL,
            " . self::CREATED_AT . " VARCHAR(100) NOT NULL,
            " . self::UPDATED_AT . " VARCHAR(100) NOT NULL
        )";
    }
}
