<?php

class CustomerWalletDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertCustomerWallet(CustomerWalletEntity $customerwalletEntity): ?CustomerWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(CustomerWalletEntity::TABLE_NAME)
            ->columns([
                CustomerWalletTableSchema::UID,
                CustomerWalletTableSchema::CUSTOMER_ID,
                CustomerWalletTableSchema::BALANCE,
                CustomerWalletTableSchema::CREATED_AT,
                CustomerWalletTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($customerwalletEntity->getUid()),
                $this->escape_string($customerwalletEntity->getCustomerId()),
                $this->escape_string($customerwalletEntity->getBalance()),
                $this->escape_string($customerwalletEntity->getCreatedAt()),
                $this->escape_string($customerwalletEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getCustomerWalletWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerWalletWithId(string $id): ?CustomerWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerWalletEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [CustomerWalletTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerWalletFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerWalletWithUid(string $uid): ?CustomerWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerWalletEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [CustomerWalletTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerWalletFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllCustomerWallet(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerWalletEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $customerwallets = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($customerwallets, CustomerWalletFactory::mapFromDatabaseResult($row));
            }
        }
        return $customerwallets;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateCustomerWallet(CustomerWalletEntity $customerwalletEntity): ?CustomerWalletEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(CustomerWalletEntity::TABLE_NAME)
            ->updateParams([
                [CustomerWalletTableSchema::CUSTOMER_ID, $this->escape_string($customerwalletEntity->getCustomerId())],
                [CustomerWalletTableSchema::BALANCE, $this->escape_string($customerwalletEntity->getBalance())],
                [CustomerWalletTableSchema::CREATED_AT, $this->escape_string($customerwalletEntity->getCreatedAt())],
                [CustomerWalletTableSchema::UPDATED_AT, $this->escape_string($customerwalletEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [CustomerWalletTableSchema::ID, '=', $this->escape_string($customerwalletEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getCustomerWalletWithId($customerwalletEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteCustomerWallet(CustomerWalletEntity $customerwalletEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(CustomerWalletEntity::TABLE_NAME)
            ->whereParams([
                [CustomerWalletTableSchema::ID, '=', $this->escape_string($customerwalletEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllCustomerWallets(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(CustomerWalletEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerWalletWithCustomerId(string $id): ?CustomerWalletEntity {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(CustomerWalletEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [CustomerWalletTableSchema::CUSTOMER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerWalletFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    }

}
