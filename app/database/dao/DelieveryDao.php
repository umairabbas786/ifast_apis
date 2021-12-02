<?php

class DelieveryDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDelievery(DelieveryEntity $delieveryEntity): ?DelieveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DelieveryEntity::TABLE_NAME)
            ->columns([
                DelieveryTableSchema::UID,
                DelieveryTableSchema::CUSTOMER_ID,
                DelieveryTableSchema::DRIVER_ID,
                DelieveryTableSchema::ITEM_NAMES,
                DelieveryTableSchema::DESCRIPTION,
                DelieveryTableSchema::PICKUP_LOCATION,
                DelieveryTableSchema::DELIVERY_DESTINATION,
                DelieveryTableSchema::DATE_OF_DELIVERY,
                DelieveryTableSchema::PICKUP_TIME,
                DelieveryTableSchema::VEHICLE_TYPE,
                DelieveryTableSchema::ITEMS_WEIGHT,
                DelieveryTableSchema::INSTRUCTIONS,
                DelieveryTableSchema::PENDING,
                DelieveryTableSchema::STATUS,
                DelieveryTableSchema::CREATED_AT,
                DelieveryTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($delieveryEntity->getUid()),
                $this->escape_string($delieveryEntity->getCustomerId()),
                $this->escape_string($delieveryEntity->getDriverId()),
                $this->escape_string($delieveryEntity->getItemNames()),
                $this->escape_string($delieveryEntity->getDescription()),
                $this->escape_string($delieveryEntity->getPickupLocation()),
                $this->escape_string($delieveryEntity->getDeliveryDestination()),
                $this->escape_string($delieveryEntity->getDateOfDelivery()),
                $this->escape_string($delieveryEntity->getPickupTime()),
                $this->escape_string($delieveryEntity->getVehicleType()),
                $this->escape_string($delieveryEntity->getItemsWeight()),
                $this->escape_string($delieveryEntity->getInstructions()),
                $this->escape_string($delieveryEntity->getPending()),
                $this->wrapBool($delieveryEntity->isStatus()),
                $this->escape_string($delieveryEntity->getCreatedAt()),
                $this->escape_string($delieveryEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDelieveryWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDelieveryWithId(string $id): ?DelieveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DelieveryEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DelieveryTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DelieveryFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDelieveryWithUid(string $uid): ?DelieveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DelieveryEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DelieveryTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DelieveryFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDelievery(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DelieveryEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $delieverys = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($delieverys, DelieveryFactory::mapFromDatabaseResult($row));
            }
        }
        return $delieverys;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDelievery(DelieveryEntity $delieveryEntity): ?DelieveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DelieveryEntity::TABLE_NAME)
            ->updateParams([
                [DelieveryTableSchema::CUSTOMER_ID, $this->escape_string($delieveryEntity->getCustomerId())],
                [DelieveryTableSchema::DRIVER_ID, $this->escape_string($delieveryEntity->getDriverId())],
                [DelieveryTableSchema::ITEM_NAMES, $this->escape_string($delieveryEntity->getItemNames())],
                [DelieveryTableSchema::DESCRIPTION, $this->escape_string($delieveryEntity->getDescription())],
                [DelieveryTableSchema::PICKUP_LOCATION, $this->escape_string($delieveryEntity->getPickupLocation())],
                [DelieveryTableSchema::DELIVERY_DESTINATION, $this->escape_string($delieveryEntity->getDeliveryDestination())],
                [DelieveryTableSchema::DATE_OF_DELIVERY, $this->escape_string($delieveryEntity->getDateOfDelivery())],
                [DelieveryTableSchema::PICKUP_TIME, $this->escape_string($delieveryEntity->getPickupTime())],
                [DelieveryTableSchema::VEHICLE_TYPE, $this->escape_string($delieveryEntity->getVehicleType())],
                [DelieveryTableSchema::ITEMS_WEIGHT, $this->escape_string($delieveryEntity->getItemsWeight())],
                [DelieveryTableSchema::INSTRUCTIONS, $this->escape_string($delieveryEntity->getInstructions())],
                [DelieveryTableSchema::PENDING, $this->escape_string($delieveryEntity->getPending())],
                [DelieveryTableSchema::STATUS, $this->wrapBool($delieveryEntity->isStatus())],
                [DelieveryTableSchema::CREATED_AT, $this->escape_string($delieveryEntity->getCreatedAt())],
                [DelieveryTableSchema::UPDATED_AT, $this->escape_string($delieveryEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DelieveryTableSchema::ID, '=', $this->escape_string($delieveryEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDelieveryWithId($delieveryEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDelievery(DelieveryEntity $delieveryEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DelieveryEntity::TABLE_NAME)
            ->whereParams([
                [DelieveryTableSchema::ID, '=', $this->escape_string($delieveryEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDelieverys(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DelieveryEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDeliveriesWithDriverID(string $driver_id): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DelieveryEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DelieveryTableSchema::DRIVER_ID, '=', $this->escape_string($driver_id)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);
        $deliveries = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($deliveries, DelieveryFactory::mapFromDatabaseResult($row));
            }
        }
        return $deliveries;
    }

}
