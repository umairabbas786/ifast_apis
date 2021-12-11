<?php

class DriverConversationDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriverConversation(DriverConversationEntity $driverconversationEntity): ?DriverConversationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DriverConversationEntity::TABLE_NAME)
            ->columns([
                DriverConversationTableSchema::UID,
                DriverConversationTableSchema::SENDER_ID,
                DriverConversationTableSchema::RECIPIENT_ID,
                DriverConversationTableSchema::MESSAGE,
                DriverConversationTableSchema::CREATED_AT,
                DriverConversationTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driverconversationEntity->getUid()),
                $this->escape_string($driverconversationEntity->getSenderId()),
                $this->escape_string($driverconversationEntity->getRecipientId()),
                $this->escape_string($driverconversationEntity->getMessage()),
                $this->escape_string($driverconversationEntity->getCreatedAt()),
                $this->escape_string($driverconversationEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverConversationWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverConversationWithId(string $id): ?DriverConversationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverConversationEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverConversationTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverConversationFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverConversationWithUid(string $uid): ?DriverConversationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverConversationEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverConversationTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverConversationFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriverConversation(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverConversationEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverconversations = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverconversations, DriverConversationFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverconversations;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriverConversation(DriverConversationEntity $driverconversationEntity): ?DriverConversationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DriverConversationEntity::TABLE_NAME)
            ->updateParams([
                [DriverConversationTableSchema::SENDER_ID, $this->escape_string($driverconversationEntity->getSenderId())],
                [DriverConversationTableSchema::RECIPIENT_ID, $this->escape_string($driverconversationEntity->getRecipientId())],
                [DriverConversationTableSchema::MESSAGE, $this->escape_string($driverconversationEntity->getMessage())],
                [DriverConversationTableSchema::CREATED_AT, $this->escape_string($driverconversationEntity->getCreatedAt())],
                [DriverConversationTableSchema::UPDATED_AT, $this->escape_string($driverconversationEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DriverConversationTableSchema::ID, '=', $this->escape_string($driverconversationEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverConversationWithId($driverconversationEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriverConversation(DriverConversationEntity $driverconversationEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverConversationEntity::TABLE_NAME)
            ->whereParams([
                [DriverConversationTableSchema::ID, '=', $this->escape_string($driverconversationEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDriverConversations(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverConversationEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllConversationsRelatedToDriver(string $driver_id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverConversationEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverConversationTableSchema::RECIPIENT_ID,'=', $this->escape_string($driver_id)],
                ['OR'],
                [DriverConversationTableSchema::SENDER_ID, '=', $this->escape_string($driver_id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverconversations = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverconversations, DriverConversationFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverconversations;
    }

    public function getAllConversations(string $driver_id,string $recipients_id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverConversationEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverConversationTableSchema::RECIPIENT_ID,'=', $this->escape_string($driver_id)],
                ['OR'],
                [DriverConversationTableSchema::SENDER_ID, '=', $this->escape_string($driver_id)],
                ['OR'],
                [DriverConversationTableSchema::RECIPIENT_ID,'=', $this->escape_string($recipients_id)],
                ['OR'],
                [DriverConversationTableSchema::SENDER_ID,'=', $this->escape_string($recipients_id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverconversations = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverconversations, DriverConversationFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverconversations;
    }

}
