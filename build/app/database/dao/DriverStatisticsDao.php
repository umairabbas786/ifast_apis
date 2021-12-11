<?php

class DriverStatisticsDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriverStatistics(DriverStatisticsEntity $driverstatisticsEntity): ?DriverStatisticsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DriverStatisticsEntity::TABLE_NAME)
            ->columns([
                DriverStatisticsTableSchema::UID,
                DriverStatisticsTableSchema::DRIVER_ID,
                DriverStatisticsTableSchema::COMPLETED_DELIVERIES,
                DriverStatisticsTableSchema::DRIVER_LEVEL,
                DriverStatisticsTableSchema::SUCCESS_RATING,
                DriverStatisticsTableSchema::CREATED_AT,
                DriverStatisticsTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driverstatisticsEntity->getUid()),
                $this->escape_string($driverstatisticsEntity->getDriverId()),
                $this->escape_string($driverstatisticsEntity->getCompletedDeliveries()),
                $this->escape_string($driverstatisticsEntity->getDriverLevel()),
                $this->escape_string($driverstatisticsEntity->getSuccessRating()),
                $this->escape_string($driverstatisticsEntity->getCreatedAt()),
                $this->escape_string($driverstatisticsEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverStatisticsWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverStatisticsWithId(string $id): ?DriverStatisticsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverStatisticsEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverStatisticsTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverStatisticsFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverStatisticsWithUid(string $uid): ?DriverStatisticsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverStatisticsEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverStatisticsTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverStatisticsFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriverStatistics(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverStatisticsEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverstatisticss = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverstatisticss, DriverStatisticsFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverstatisticss;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriverStatistics(DriverStatisticsEntity $driverstatisticsEntity): ?DriverStatisticsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DriverStatisticsEntity::TABLE_NAME)
            ->updateParams([
                [DriverStatisticsTableSchema::DRIVER_ID, $this->escape_string($driverstatisticsEntity->getDriverId())],
                [DriverStatisticsTableSchema::COMPLETED_DELIVERIES, $this->escape_string($driverstatisticsEntity->getCompletedDeliveries())],
                [DriverStatisticsTableSchema::DRIVER_LEVEL, $this->escape_string($driverstatisticsEntity->getDriverLevel())],
                [DriverStatisticsTableSchema::SUCCESS_RATING, $this->escape_string($driverstatisticsEntity->getSuccessRating())],
                [DriverStatisticsTableSchema::CREATED_AT, $this->escape_string($driverstatisticsEntity->getCreatedAt())],
                [DriverStatisticsTableSchema::UPDATED_AT, $this->escape_string($driverstatisticsEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DriverStatisticsTableSchema::ID, '=', $this->escape_string($driverstatisticsEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverStatisticsWithId($driverstatisticsEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriverStatistics(DriverStatisticsEntity $driverstatisticsEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverStatisticsEntity::TABLE_NAME)
            ->whereParams([
                [DriverStatisticsTableSchema::ID, '=', $this->escape_string($driverstatisticsEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDriverStatisticss(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverStatisticsEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverStatisticsWithDriverID(string $id): ?DriverStatisticsEntity {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverStatisticsEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverStatisticsTableSchema::DRIVER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverStatisticsFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    }

}
