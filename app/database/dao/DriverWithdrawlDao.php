<?php

class DriverWithdrawlDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriverWithdrawl(DriverWithdrawlEntity $driverwithdrawlEntity): ?DriverWithdrawlEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
            ->columns([
                DriverWithdrawlTableSchema::UID,
                DriverWithdrawlTableSchema::DRIVER_ID,
                DriverWithdrawlTableSchema::WITHDRAW_METHOD,
                DriverWithdrawlTableSchema::AMOUNT,
                DriverWithdrawlTableSchema::STATUS,
                DriverWithdrawlTableSchema::CREATED_AT,
                DriverWithdrawlTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driverwithdrawlEntity->getUid()),
                $this->escape_string($driverwithdrawlEntity->getDriverId()),
                $this->escape_string($driverwithdrawlEntity->getWithdrawMethod()),
                $this->escape_string($driverwithdrawlEntity->getAmount()),
                $this->escape_string($driverwithdrawlEntity->getStatus()),
                $this->escape_string($driverwithdrawlEntity->getCreatedAt()),
                $this->escape_string($driverwithdrawlEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverWithdrawlWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWithdrawlWithId(string $id): ?DriverWithdrawlEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverWithdrawlTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverWithdrawlFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWithdrawlWithUid(string $uid): ?DriverWithdrawlEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverWithdrawlTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverWithdrawlFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriverWithdrawl(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverwithdrawls = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverwithdrawls, DriverWithdrawlFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverwithdrawls;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriverWithdrawl(DriverWithdrawlEntity $driverwithdrawlEntity): ?DriverWithdrawlEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
            ->updateParams([
                [DriverWithdrawlTableSchema::DRIVER_ID, $this->escape_string($driverwithdrawlEntity->getDriverId())],
                [DriverWithdrawlTableSchema::WITHDRAW_METHOD, $this->escape_string($driverwithdrawlEntity->getWithdrawMethod())],
                [DriverWithdrawlTableSchema::AMOUNT, $this->escape_string($driverwithdrawlEntity->getAmount())],
                [DriverWithdrawlTableSchema::STATUS, $this->escape_string($driverwithdrawlEntity->getStatus())],
                [DriverWithdrawlTableSchema::CREATED_AT, $this->escape_string($driverwithdrawlEntity->getCreatedAt())],
                [DriverWithdrawlTableSchema::UPDATED_AT, $this->escape_string($driverwithdrawlEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DriverWithdrawlTableSchema::ID, '=', $this->escape_string($driverwithdrawlEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverWithdrawlWithId($driverwithdrawlEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriverWithdrawl(DriverWithdrawlEntity $driverwithdrawlEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
            ->whereParams([
                [DriverWithdrawlTableSchema::ID, '=', $this->escape_string($driverwithdrawlEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDriverWithdrawls(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWithdrawlWithDriverId(string $id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverWithdrawlEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverWithdrawlTableSchema::DRIVER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $ads = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($ads, DriverWithdrawlFactory::mapFromDatabaseResult($row));
            }
        }
        return $ads;
    }
}
