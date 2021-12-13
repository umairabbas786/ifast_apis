<?php

class ConfirmDeliveryDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertConfirmDelivery(ConfirmDeliveryEntity $confirmdeliveryEntity): ?ConfirmDeliveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
            ->columns([
                ConfirmDeliveryTableSchema::UID,
                ConfirmDeliveryTableSchema::DELIVERY_ID,
                ConfirmDeliveryTableSchema::CUSTOMER_ID,
                ConfirmDeliveryTableSchema::DRIVER_ID,
                ConfirmDeliveryTableSchema::LOCATION,
                ConfirmDeliveryTableSchema::NUMBER_PLATE,
                ConfirmDeliveryTableSchema::FACE,
                ConfirmDeliveryTableSchema::BEFORE_ITEMS,
                ConfirmDeliveryTableSchema::AFTER_ITEMS,
                ConfirmDeliveryTableSchema::CONFIRMED,
                ConfirmDeliveryTableSchema::STATUS,
                ConfirmDeliveryTableSchema::CREATED_AT,
                ConfirmDeliveryTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($confirmdeliveryEntity->getUid()),
                $this->escape_string($confirmdeliveryEntity->getDeliveryId()),
                $this->escape_string($confirmdeliveryEntity->getCustomerId()),
                $this->escape_string($confirmdeliveryEntity->getDriverId()),
                $this->escape_string($confirmdeliveryEntity->getLocation()),
                $this->escape_string($confirmdeliveryEntity->getNumberPlate()),
                $this->escape_string($confirmdeliveryEntity->getFace()),
                $this->escape_string($confirmdeliveryEntity->getBeforeItems()),
                $this->escape_string($confirmdeliveryEntity->getAfterItems()),
                $this->escape_string($confirmdeliveryEntity->getConfirmed()),
                $this->wrapBool($confirmdeliveryEntity->isStatus()),
                $this->escape_string($confirmdeliveryEntity->getCreatedAt()),
                $this->escape_string($confirmdeliveryEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getConfirmDeliveryWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getConfirmDeliveryWithId(string $id): ?ConfirmDeliveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [ConfirmDeliveryTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return ConfirmDeliveryFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getConfirmDeliveryWithUid(string $uid): ?ConfirmDeliveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [ConfirmDeliveryTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return ConfirmDeliveryFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllConfirmDelivery(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $confirmdeliverys = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($confirmdeliverys, ConfirmDeliveryFactory::mapFromDatabaseResult($row));
            }
        }
        return $confirmdeliverys;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateConfirmDelivery(ConfirmDeliveryEntity $confirmdeliveryEntity): ?ConfirmDeliveryEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
            ->updateParams([
                [ConfirmDeliveryTableSchema::DELIVERY_ID, $this->escape_string($confirmdeliveryEntity->getDeliveryId())],
                [ConfirmDeliveryTableSchema::CUSTOMER_ID, $this->escape_string($confirmdeliveryEntity->getCustomerId())],
                [ConfirmDeliveryTableSchema::DRIVER_ID, $this->escape_string($confirmdeliveryEntity->getDriverId())],
                [ConfirmDeliveryTableSchema::LOCATION, $this->escape_string($confirmdeliveryEntity->getLocation())],
                [ConfirmDeliveryTableSchema::NUMBER_PLATE, $this->escape_string($confirmdeliveryEntity->getNumberPlate())],
                [ConfirmDeliveryTableSchema::FACE, $this->escape_string($confirmdeliveryEntity->getFace())],
                [ConfirmDeliveryTableSchema::BEFORE_ITEMS, $this->escape_string($confirmdeliveryEntity->getBeforeItems())],
                [ConfirmDeliveryTableSchema::AFTER_ITEMS, $this->escape_string($confirmdeliveryEntity->getAfterItems())],
                [ConfirmDeliveryTableSchema::CONFIRMED, $this->escape_string($confirmdeliveryEntity->getConfirmed())],
                [ConfirmDeliveryTableSchema::STATUS, $this->wrapBool($confirmdeliveryEntity->isStatus())],
                [ConfirmDeliveryTableSchema::CREATED_AT, $this->escape_string($confirmdeliveryEntity->getCreatedAt())],
                [ConfirmDeliveryTableSchema::UPDATED_AT, $this->escape_string($confirmdeliveryEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [ConfirmDeliveryTableSchema::ID, '=', $this->escape_string($confirmdeliveryEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getConfirmDeliveryWithId($confirmdeliveryEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteConfirmDelivery(ConfirmDeliveryEntity $confirmdeliveryEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
            ->whereParams([
                [ConfirmDeliveryTableSchema::ID, '=', $this->escape_string($confirmdeliveryEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllConfirmDeliverys(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getConfirmDeliveryWithDeliveryID(string $uid): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(ConfirmDeliveryEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [ConfirmDeliveryTableSchema::DELIVERY_ID, '=', $this->escape_string($uid)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $ads = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($ads, ConfirmDeliveryFactory::mapFromDatabaseResult($row));
            }
        }
        return $ads;
    }

}
