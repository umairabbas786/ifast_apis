<?php


class DriverConversationFactory {
    /**
     * @param string[]|null|false $result
     * @return DriverConversationEntity
     */
    public static function mapFromDatabaseResult($result): DriverConversationEntity {
        $entity = new DriverConversationEntity(
            $result[DriverConversationTableSchema::UID],
            $result[DriverConversationTableSchema::SENDER_ID],
            $result[DriverConversationTableSchema::RECIPIENT_ID],
            $result[DriverConversationTableSchema::MESSAGE],
            $result[DriverConversationTableSchema::CREATED_AT],
            $result[DriverConversationTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DriverConversationTableSchema::ID]);
        return $entity;
    }
}
