<?php

class RegisterCustomerDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertRegisterCustomer(RegisterCustomerEntity $registercustomerEntity): ?RegisterCustomerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(RegisterCustomerEntity::TABLE_NAME)
            ->columns([
                RegisterCustomerTableSchema::UID,
                RegisterCustomerTableSchema::PROFILE_PICTURE,
                RegisterCustomerTableSchema::FIRST_NAME,
                RegisterCustomerTableSchema::LAST_NAME,
                RegisterCustomerTableSchema::EMAIL,
                RegisterCustomerTableSchema::COUNTRY,
                RegisterCustomerTableSchema::PASSWORD,
                RegisterCustomerTableSchema::ACCOUNT_VERIFIED,
                RegisterCustomerTableSchema::CREATED_AT,
                RegisterCustomerTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($registercustomerEntity->getUid()),
                $this->escape_string($registercustomerEntity->getProfilePicture()),
                $this->escape_string($registercustomerEntity->getFirstName()),
                $this->escape_string($registercustomerEntity->getLastName()),
                $this->escape_string($registercustomerEntity->getEmail()),
                $this->escape_string($registercustomerEntity->getCountry()),
                $this->escape_string($registercustomerEntity->getPassword()),
                $this->wrapBool($registercustomerEntity->isAccountVerified()),
                $this->escape_string($registercustomerEntity->getCreatedAt()),
                $this->escape_string($registercustomerEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getRegisterCustomerWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getRegisterCustomerWithId(string $id): ?RegisterCustomerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(RegisterCustomerEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [RegisterCustomerTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return RegisterCustomerFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getRegisterCustomerWithUid(string $uid): ?RegisterCustomerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(RegisterCustomerEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [RegisterCustomerTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return RegisterCustomerFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllRegisterCustomer(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(RegisterCustomerEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $registercustomers = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($registercustomers, RegisterCustomerFactory::mapFromDatabaseResult($row));
            }
        }
        return $registercustomers;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateRegisterCustomer(RegisterCustomerEntity $registercustomerEntity): ?RegisterCustomerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(RegisterCustomerEntity::TABLE_NAME)
            ->updateParams([
                [RegisterCustomerTableSchema::PROFILE_PICTURE, $this->escape_string($registercustomerEntity->getProfilePicture())],
                [RegisterCustomerTableSchema::FIRST_NAME, $this->escape_string($registercustomerEntity->getFirstName())],
                [RegisterCustomerTableSchema::LAST_NAME, $this->escape_string($registercustomerEntity->getLastName())],
                [RegisterCustomerTableSchema::EMAIL, $this->escape_string($registercustomerEntity->getEmail())],
                [RegisterCustomerTableSchema::COUNTRY, $this->escape_string($registercustomerEntity->getCountry())],
                [RegisterCustomerTableSchema::PASSWORD, $this->escape_string($registercustomerEntity->getPassword())],
                [RegisterCustomerTableSchema::ACCOUNT_VERIFIED, $this->wrapBool($registercustomerEntity->isAccountVerified())],
                [RegisterCustomerTableSchema::CREATED_AT, $this->escape_string($registercustomerEntity->getCreatedAt())],
                [RegisterCustomerTableSchema::UPDATED_AT, $this->escape_string($registercustomerEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [RegisterCustomerTableSchema::ID, '=', $this->escape_string($registercustomerEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getRegisterCustomerWithId($registercustomerEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteRegisterCustomer(RegisterCustomerEntity $registercustomerEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(RegisterCustomerEntity::TABLE_NAME)
            ->whereParams([
                [RegisterCustomerTableSchema::ID, '=', $this->escape_string($registercustomerEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllRegisterCustomers(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(RegisterCustomerEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getRegisterCustomerWithEmail(string $id): ?RegisterCustomerEntity {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(RegisterCustomerEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [RegisterCustomerTableSchema::EMAIL, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return RegisterCustomerFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    }

    public function deleteRegisterCustomerWithId(string $id): bool {
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(RegisterCustomerEntity::TABLE_NAME)
            ->whereParams([
                [RegisterCustomerTableSchema::ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    }

}
