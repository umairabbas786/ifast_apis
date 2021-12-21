<?php

class CustomerDepositDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertCustomerDeposit(CustomerDepositEntity $customerdepositEntity): ?CustomerDepositEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(CustomerDepositEntity::TABLE_NAME)
            ->columns([
                CustomerDepositTableSchema::UID,
                CustomerDepositTableSchema::CUSTOMER_ID,
                CustomerDepositTableSchema::AMOUNT,
                CustomerDepositTableSchema::STATUS,
                CustomerDepositTableSchema::CREATED_AT,
                CustomerDepositTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($customerdepositEntity->getUid()),
                $this->escape_string($customerdepositEntity->getCustomerId()),
                $this->escape_string($customerdepositEntity->getAmount()),
                $this->escape_string($customerdepositEntity->getStatus()),
                $this->escape_string($customerdepositEntity->getCreatedAt()),
                $this->escape_string($customerdepositEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getCustomerDepositWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerDepositWithId(string $id): ?CustomerDepositEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerDepositEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [CustomerDepositTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerDepositFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerDepositWithUid(string $uid): ?CustomerDepositEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerDepositEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [CustomerDepositTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerDepositFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllCustomerDeposit(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerDepositEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $customerdeposits = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($customerdeposits, CustomerDepositFactory::mapFromDatabaseResult($row));
            }
        }
        return $customerdeposits;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateCustomerDeposit(CustomerDepositEntity $customerdepositEntity): ?CustomerDepositEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(CustomerDepositEntity::TABLE_NAME)
            ->updateParams([
                [CustomerDepositTableSchema::CUSTOMER_ID, $this->escape_string($customerdepositEntity->getCustomerId())],
                [CustomerDepositTableSchema::AMOUNT, $this->escape_string($customerdepositEntity->getAmount())],
                [CustomerDepositTableSchema::STATUS, $this->escape_string($customerdepositEntity->getStatus())],
                [CustomerDepositTableSchema::CREATED_AT, $this->escape_string($customerdepositEntity->getCreatedAt())],
                [CustomerDepositTableSchema::UPDATED_AT, $this->escape_string($customerdepositEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [CustomerDepositTableSchema::ID, '=', $this->escape_string($customerdepositEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getCustomerDepositWithId($customerdepositEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteCustomerDeposit(CustomerDepositEntity $customerdepositEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(CustomerDepositEntity::TABLE_NAME)
            ->whereParams([
                [CustomerDepositTableSchema::ID, '=', $this->escape_string($customerdepositEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllCustomerDeposits(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(CustomerDepositEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

}
