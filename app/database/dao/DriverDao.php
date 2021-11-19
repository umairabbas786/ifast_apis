<?php

class DriverDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriver(DriverEntity $driverEntity): ?DriverEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DriverEntity::TABLE_NAME)
            ->columns([
                DriverTableSchema::UID,
                DriverTableSchema::PROFILE_PICTURE,
                DriverTableSchema::FULL_NAME,
                DriverTableSchema::EMAIL,
                DriverTableSchema::DATE_OF_BIRTH,
                DriverTableSchema::COUNTRY,
                DriverTableSchema::PASSWORD,
                DriverTableSchema::PROOF,
                DriverTableSchema::EMAIL_CODE,
                DriverTableSchema::EMAIL_VERIFIED,
                DriverTableSchema::STATUS,
                DriverTableSchema::CREATED_AT,
                DriverTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driverEntity->getUid()),
                $this->escape_string($driverEntity->getProfilePicture()),
                $this->escape_string($driverEntity->getFullName()),
                $this->escape_string($driverEntity->getEmail()),
                $this->escape_string($driverEntity->getDateOfBirth()),
                $this->escape_string($driverEntity->getCountry()),
                $this->escape_string($driverEntity->getPassword()),
                $this->escape_string($driverEntity->getProof()),
                $this->escape_string($driverEntity->getEmailCode()),
                $this->wrapBool($driverEntity->isEmailVerified()),
                $this->wrapBool($driverEntity->isStatus()),
                $this->escape_string($driverEntity->getCreatedAt()),
                $this->escape_string($driverEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWithId(string $id): ?DriverEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWithUid(string $uid): ?DriverEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriver(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $drivers = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($drivers, DriverFactory::mapFromDatabaseResult($row));
            }
        }
        return $drivers;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriver(DriverEntity $driverEntity): ?DriverEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DriverEntity::TABLE_NAME)
            ->updateParams([
                [DriverTableSchema::PROFILE_PICTURE, $this->escape_string($driverEntity->getProfilePicture())],
                [DriverTableSchema::FULL_NAME, $this->escape_string($driverEntity->getFullName())],
                [DriverTableSchema::EMAIL, $this->escape_string($driverEntity->getEmail())],
                [DriverTableSchema::DATE_OF_BIRTH, $this->escape_string($driverEntity->getDateOfBirth())],
                [DriverTableSchema::COUNTRY, $this->escape_string($driverEntity->getCountry())],
                [DriverTableSchema::PASSWORD, $this->escape_string($driverEntity->getPassword())],
                [DriverTableSchema::PROOF, $this->escape_string($driverEntity->getProof())],
                [DriverTableSchema::EMAIL_CODE, $this->escape_string($driverEntity->getEmailCode())],
                [DriverTableSchema::EMAIL_VERIFIED, $this->wrapBool($driverEntity->isEmailVerified())],
                [DriverTableSchema::STATUS, $this->wrapBool($driverEntity->isStatus())],
                [DriverTableSchema::CREATED_AT, $this->escape_string($driverEntity->getCreatedAt())],
                [DriverTableSchema::UPDATED_AT, $this->escape_string($driverEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DriverTableSchema::ID, '=', $this->escape_string($driverEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverWithId($driverEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriver(DriverEntity $driverEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverEntity::TABLE_NAME)
            ->whereParams([
                [DriverTableSchema::ID, '=', $this->escape_string($driverEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDrivers(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverWithEmail(string $driverEmail): ?DriverEntity {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams(array(
                [DriverTableSchema::EMAIL, '=', $this->escape_string($driverEmail)]
            ))
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    }

}
