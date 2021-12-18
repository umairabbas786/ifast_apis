<?php

class DriverPartnerDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertDriverPartner(DriverPartnerEntity $driverpartnerEntity): ?DriverPartnerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(DriverPartnerEntity::TABLE_NAME)
            ->columns([
                DriverPartnerTableSchema::UID,
                DriverPartnerTableSchema::DRIVER_ID,
                DriverPartnerTableSchema::PARTNER_ID,
                DriverPartnerTableSchema::PARTNER_TYPE,
                DriverPartnerTableSchema::STATUS,
                DriverPartnerTableSchema::CREATED_AT,
                DriverPartnerTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($driverpartnerEntity->getUid()),
                $this->escape_string($driverpartnerEntity->getDriverId()),
                $this->escape_string($driverpartnerEntity->getPartnerId()),
                $this->escape_string($driverpartnerEntity->getPartnerType()),
                $this->wrapBool($driverpartnerEntity->isStatus()),
                $this->escape_string($driverpartnerEntity->getCreatedAt()),
                $this->escape_string($driverpartnerEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverPartnerWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverPartnerWithId(string $id): ?DriverPartnerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverPartnerEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverPartnerTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverPartnerFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverPartnerWithUid(string $uid): ?DriverPartnerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverPartnerEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [DriverPartnerTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverPartnerFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllDriverPartner(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(DriverPartnerEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $driverpartners = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($driverpartners, DriverPartnerFactory::mapFromDatabaseResult($row));
            }
        }
        return $driverpartners;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateDriverPartner(DriverPartnerEntity $driverpartnerEntity): ?DriverPartnerEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(DriverPartnerEntity::TABLE_NAME)
            ->updateParams([
                [DriverPartnerTableSchema::DRIVER_ID, $this->escape_string($driverpartnerEntity->getDriverId())],
                [DriverPartnerTableSchema::PARTNER_ID, $this->escape_string($driverpartnerEntity->getPartnerId())],
                [DriverPartnerTableSchema::PARTNER_TYPE, $this->escape_string($driverpartnerEntity->getPartnerType())],
                [DriverPartnerTableSchema::STATUS, $this->wrapBool($driverpartnerEntity->isStatus())],
                [DriverPartnerTableSchema::CREATED_AT, $this->escape_string($driverpartnerEntity->getCreatedAt())],
                [DriverPartnerTableSchema::UPDATED_AT, $this->escape_string($driverpartnerEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [DriverPartnerTableSchema::ID, '=', $this->escape_string($driverpartnerEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getDriverPartnerWithId($driverpartnerEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteDriverPartner(DriverPartnerEntity $driverpartnerEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverPartnerEntity::TABLE_NAME)
            ->whereParams([
                [DriverPartnerTableSchema::ID, '=', $this->escape_string($driverpartnerEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllDriverPartners(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(DriverPartnerEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getDriverPartnerWithDriverId(string $uid): array {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverPartnerEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverPartnerTableSchema::DRIVER_ID, '=', $this->escape_string($uid)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $ads = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($ads, DriverPartnerFactory::mapFromDatabaseResult($row));
            }
        }
        return $ads;
    }

    public function getDriverPartnerWithDriverIdAndPartnerId(string $did,string $pid): ?DriverPartnerEntity {
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
            ->withTableName(DriverPartnerEntity::TABLE_NAME)
            ->columns(['*'])
            ->whereParams([
                [DriverPartnerTableSchema::DRIVER_ID, '=', $this->escape_string($did)],
                ['AND'],
                [DriverPartnerTableSchema::PARTNER_ID, '=', $this->escape_string($pid)]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return DriverPartnerFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    }
}
