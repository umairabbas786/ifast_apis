<?php

class CustomerNotificationDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertCustomerNotification(CustomerNotificationEntity $customernotificationEntity): ?CustomerNotificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(CustomerNotificationEntity::TABLE_NAME)
            ->columns([
                CustomerNotificationTableSchema::UID,
                CustomerNotificationTableSchema::CUSTOMER_ID,
                CustomerNotificationTableSchema::MSG,
                CustomerNotificationTableSchema::STATE,
                CustomerNotificationTableSchema::CREATED_AT,
                CustomerNotificationTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($customernotificationEntity->getUid()),
                $this->escape_string($customernotificationEntity->getCustomerId()),
                $this->escape_string($customernotificationEntity->getMsg()),
                $this->wrapBool($customernotificationEntity->isState()),
                $this->escape_string($customernotificationEntity->getCreatedAt()),
                $this->escape_string($customernotificationEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getCustomerNotificationWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerNotificationWithId(string $id): ?CustomerNotificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerNotificationEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [CustomerNotificationTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerNotificationFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerNotificationWithUid(string $uid): ?CustomerNotificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerNotificationEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [CustomerNotificationTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return CustomerNotificationFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllCustomerNotification(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(CustomerNotificationEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $customernotifications = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($customernotifications, CustomerNotificationFactory::mapFromDatabaseResult($row));
            }
        }
        return $customernotifications;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateCustomerNotification(CustomerNotificationEntity $customernotificationEntity): ?CustomerNotificationEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(CustomerNotificationEntity::TABLE_NAME)
            ->updateParams([
                [CustomerNotificationTableSchema::CUSTOMER_ID, $this->escape_string($customernotificationEntity->getCustomerId())],
                [CustomerNotificationTableSchema::MSG, $this->escape_string($customernotificationEntity->getMsg())],
                [CustomerNotificationTableSchema::STATE, $this->wrapBool($customernotificationEntity->isState())],
                [CustomerNotificationTableSchema::CREATED_AT, $this->escape_string($customernotificationEntity->getCreatedAt())],
                [CustomerNotificationTableSchema::UPDATED_AT, $this->escape_string($customernotificationEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [CustomerNotificationTableSchema::ID, '=', $this->escape_string($customernotificationEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getCustomerNotificationWithId($customernotificationEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteCustomerNotification(CustomerNotificationEntity $customernotificationEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(CustomerNotificationEntity::TABLE_NAME)
            ->whereParams([
                [CustomerNotificationTableSchema::ID, '=', $this->escape_string($customernotificationEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllCustomerNotifications(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(CustomerNotificationEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getCustomerNotificationWithCustomerId(string $id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(CustomerNotificationEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [CustomerNotificationTableSchema::CUSTOMER_ID, '=', $this->escape_string($id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $Notifications = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($Notifications, CustomerNotificationFactory::mapFromDatabaseResult($row));
            }
        }
        return $Notifications;
    }

}
