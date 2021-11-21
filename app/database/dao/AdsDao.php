<?php

class AdsDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertAds(AdsEntity $adsEntity): ?AdsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(AdsEntity::TABLE_NAME)
            ->columns([
                AdsTableSchema::UID,
                AdsTableSchema::DRIVER_ID,
                AdsTableSchema::DRIVER_NAME,
                AdsTableSchema::LOCATION,
                AdsTableSchema::AVAILABILITY_STATUS,
                AdsTableSchema::VEHICLE_TYPE,
                AdsTableSchema::STATUS,
                AdsTableSchema::CREATED_AT,
                AdsTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($adsEntity->getUid()),
                $this->escape_string($adsEntity->getDriverId()),
                $this->escape_string($adsEntity->getDriverName()),
                $this->escape_string($adsEntity->getLocation()),
                $this->wrapBool($adsEntity->isAvailabilityStatus()),
                $this->escape_string($adsEntity->getVehicleType()),
                $this->wrapBool($adsEntity->isStatus()),
                $this->escape_string($adsEntity->getCreatedAt()),
                $this->escape_string($adsEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getAdsWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAdsWithId(string $id): ?AdsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(AdsEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [AdsTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return AdsFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAdsWithUid(string $uid): ?AdsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(AdsEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [AdsTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result && $result->num_rows >= 1) {
            return AdsFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllAds(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(AdsEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $adss = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($adss, AdsFactory::mapFromDatabaseResult($row));
            }
        }
        return $adss;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateAds(AdsEntity $adsEntity): ?AdsEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(AdsEntity::TABLE_NAME)
            ->updateParams([
                [AdsTableSchema::DRIVER_ID, $this->escape_string($adsEntity->getDriverId())],
                [AdsTableSchema::DRIVER_NAME, $this->escape_string($adsEntity->getDriverName())],
                [AdsTableSchema::LOCATION, $this->escape_string($adsEntity->getLocation())],
                [AdsTableSchema::AVAILABILITY_STATUS, $this->wrapBool($adsEntity->isAvailabilityStatus())],
                [AdsTableSchema::VEHICLE_TYPE, $this->escape_string($adsEntity->getVehicleType())],
                [AdsTableSchema::STATUS, $this->wrapBool($adsEntity->isStatus())],
                [AdsTableSchema::CREATED_AT, $this->escape_string($adsEntity->getCreatedAt())],
                [AdsTableSchema::UPDATED_AT, $this->escape_string($adsEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [AdsTableSchema::ID, '=', $this->escape_string($adsEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getAdsWithId($adsEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAds(AdsEntity $adsEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(AdsEntity::TABLE_NAME)
            ->whereParams([
                [AdsTableSchema::ID, '=', $this->escape_string($adsEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllAdss(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(AdsEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

}
