<?php

class DeliveryBillDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDeliveryBill(DeliveryBillEntity $deliverybillEntity): ?DeliveryBillEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DeliveryBillEntity::TABLE_NAME)
            ->columns([
                DeliveryBillTableSchema::UID,
                DeliveryBillTableSchema::DRIVER_ID,
                DeliveryBillTableSchema::CUSTOMER_ID,
                DeliveryBillTableSchema::DELIVERY_ID,
                DeliveryBillTableSchema::MILES,
                DeliveryBillTableSchema::PAYMENT,
                DeliveryBillTableSchema::STATUS,
                DeliveryBillTableSchema::CREATED_AT,
                DeliveryBillTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($deliverybillEntity->getUid()),
                $this->escape_string($deliverybillEntity->getDriverId()),
                $this->escape_string($deliverybillEntity->getCustomerId()),
                $this->escape_string($deliverybillEntity->getDeliveryId()),
                $this->escape_string($deliverybillEntity->getMiles()),
                $this->escape_string($deliverybillEntity->getPayment()),
                $this->wrapBool($deliverybillEntity->isStatus()),
                $this->escape_string($deliverybillEntity->getCreatedAt()),
                $this->escape_string($deliverybillEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDeliveryBillWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDeliveryBillWithId(string $id): ?DeliveryBillEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DeliveryBillEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DeliveryBillTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DeliveryBillFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDeliveryBillWithUid(string $uid): ?DeliveryBillEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DeliveryBillEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DeliveryBillTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DeliveryBillFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDeliveryBill(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DeliveryBillEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $deliverybills = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($deliverybills, DeliveryBillFactory::mapFromDatabaseResult($row));
            }
        }
        return $deliverybills;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDeliveryBill(DeliveryBillEntity $deliverybillEntity): ?DeliveryBillEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DeliveryBillEntity::TABLE_NAME)
            ->updateParams([
                [DeliveryBillTableSchema::DRIVER_ID, $this->escape_string($deliverybillEntity->getDriverId())],
                [DeliveryBillTableSchema::CUSTOMER_ID, $this->escape_string($deliverybillEntity->getCustomerId())],
                [DeliveryBillTableSchema::DELIVERY_ID, $this->escape_string($deliverybillEntity->getDeliveryId())],
                [DeliveryBillTableSchema::MILES, $this->escape_string($deliverybillEntity->getMiles())],
                [DeliveryBillTableSchema::PAYMENT, $this->escape_string($deliverybillEntity->getPayment())],
                [DeliveryBillTableSchema::STATUS, $this->wrapBool($deliverybillEntity->isStatus())],
                [DeliveryBillTableSchema::CREATED_AT, $this->escape_string($deliverybillEntity->getCreatedAt())],
                [DeliveryBillTableSchema::UPDATED_AT, $this->escape_string($deliverybillEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DeliveryBillTableSchema::ID, '=', $this->escape_string($deliverybillEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDeliveryBillWithId($deliverybillEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDeliveryBill(DeliveryBillEntity $deliverybillEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DeliveryBillEntity::TABLE_NAME)
            ->whereParams([
                [DeliveryBillTableSchema::ID, '=', $this->escape_string($deliverybillEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDeliveryBills(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DeliveryBillEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDeliveryBill(string $driver_id,string $customer_id,string $delivery_id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DeliveryBillEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DeliveryBillTableSchema::DRIVER_ID, '=', $this->escape_string($driver_id)],
                ['AND'],
                [DeliveryBillTableSchema::CUSTOMER_ID, '=', $this->escape_string($customer_id)],
                ['AND'],
                [DeliveryBillTableSchema::DELIVERY_ID, '=', $this->escape_string($delivery_id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $ads = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($ads, DeliveryBillFactory::mapFromDatabaseResult($row));
            }
        }
        return $ads;
    }

}
