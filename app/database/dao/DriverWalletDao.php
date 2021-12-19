<?php

class DriverWalletDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriverWallet(DriverWalletEntity $driverwalletEntity): ?DriverWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DriverWalletEntity::TABLE_NAME)
            ->columns([
                DriverWalletTableSchema::UID,
                DriverWalletTableSchema::DRIVER_ID,
                DriverWalletTableSchema::BALANCE,
                DriverWalletTableSchema::CREATED_AT,
                DriverWalletTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driverwalletEntity->getUid()),
                $this->escape_string($driverwalletEntity->getDriverId()),
                $this->escape_string($driverwalletEntity->getBalance()),
                $this->escape_string($driverwalletEntity->getCreatedAt()),
                $this->escape_string($driverwalletEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverWalletWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWalletWithId(string $id): ?DriverWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverWalletEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverWalletTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverWalletFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWalletWithUid(string $uid): ?DriverWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverWalletEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverWalletTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverWalletFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriverWallet(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverWalletEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverwallets = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverwallets, DriverWalletFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverwallets;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriverWallet(DriverWalletEntity $driverwalletEntity): ?DriverWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DriverWalletEntity::TABLE_NAME)
            ->updateParams([
                [DriverWalletTableSchema::DRIVER_ID, $this->escape_string($driverwalletEntity->getDriverId())],
                [DriverWalletTableSchema::BALANCE, $this->escape_string($driverwalletEntity->getBalance())],
                [DriverWalletTableSchema::CREATED_AT, $this->escape_string($driverwalletEntity->getCreatedAt())],
                [DriverWalletTableSchema::UPDATED_AT, $this->escape_string($driverwalletEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DriverWalletTableSchema::ID, '=', $this->escape_string($driverwalletEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverWalletWithId($driverwalletEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriverWallet(DriverWalletEntity $driverwalletEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverWalletEntity::TABLE_NAME)
            ->whereParams([
                [DriverWalletTableSchema::ID, '=', $this->escape_string($driverwalletEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDriverWallets(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverWalletEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWalletWithDriverId(string $id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverWalletEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverWalletTableSchema::DRIVER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $ads = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($ads, DriverWalletFactory::mapFromDatabaseResult($row));
            }
        }
        return $ads;
    }

    public function getDriverWalletWithDriverIdEntity(string $id): ?DriverWalletEntity {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverWalletEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverWalletTableSchema::DRIVER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverWalletFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    }

}
