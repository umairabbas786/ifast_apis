<?php

class Driver_notificationDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriver_notification(Driver_notificationEntity $driver_notificationEntity): ?Driver_notificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(Driver_notificationEntity::TABLE_NAME)
            ->columns([
                Driver_notificationTableSchema::UID,
                Driver_notificationTableSchema::DRIVER_ID,
                Driver_notificationTableSchema::MSG,
                Driver_notificationTableSchema::STATE,
                Driver_notificationTableSchema::CREATED_AT,
                Driver_notificationTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driver_notificationEntity->getUid()),
                $this->escape_string($driver_notificationEntity->getDriverId()),
                $this->escape_string($driver_notificationEntity->getMsg()),
                $this->wrapBool($driver_notificationEntity->isState()),
                $this->escape_string($driver_notificationEntity->getCreatedAt()),
                $this->escape_string($driver_notificationEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriver_notificationWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriver_notificationWithId(string $id): ?Driver_notificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(Driver_notificationEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [Driver_notificationTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return Driver_notificationFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriver_notificationWithUid(string $uid): ?Driver_notificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(Driver_notificationEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [Driver_notificationTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return Driver_notificationFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriver_notification(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(Driver_notificationEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driver_notifications = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driver_notifications, Driver_notificationFactory::mapFromDatabaseResult($row));
            }
        }
        return $driver_notifications;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriver_notification(Driver_notificationEntity $driver_notificationEntity): ?Driver_notificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(Driver_notificationEntity::TABLE_NAME)
            ->updateParams([
                [Driver_notificationTableSchema::DRIVER_ID, $this->escape_string($driver_notificationEntity->getDriverId())],
                [Driver_notificationTableSchema::MSG, $this->escape_string($driver_notificationEntity->getMsg())],
                [Driver_notificationTableSchema::STATE, $this->wrapBool($driver_notificationEntity->isState())],
                [Driver_notificationTableSchema::CREATED_AT, $this->escape_string($driver_notificationEntity->getCreatedAt())],
                [Driver_notificationTableSchema::UPDATED_AT, $this->escape_string($driver_notificationEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [Driver_notificationTableSchema::ID, '=', $this->escape_string($driver_notificationEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriver_notificationWithId($driver_notificationEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriver_notification(Driver_notificationEntity $driver_notificationEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(Driver_notificationEntity::TABLE_NAME)
            ->whereParams([
                [Driver_notificationTableSchema::ID, '=', $this->escape_string($driver_notificationEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDriver_notifications(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(Driver_notificationEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverNotificationWithDriverId(string $id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(Driver_notificationEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [Driver_notificationTableSchema::DRIVER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $Notifications = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($Notifications, Driver_notificationFactory::mapFromDatabaseResult($row));
            }
        }
        return $Notifications;
    }
}
