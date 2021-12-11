<?php


class DriverWithdrawlFactory {
    /**
     * @param string[]|null|false $result
     * @return DriverWithdrawlEntity
     */
    public static function mapFromDatabaseResult($result): DriverWithdrawlEntity {
        $entity = new DriverWithdrawlEntity(
            $result[DriverWithdrawlTableSchema::UID],
            $result[DriverWithdrawlTableSchema::DRIVER_ID],
            $result[DriverWithdrawlTableSchema::WITHDRAW_METHOD],
            $result[DriverWithdrawlTableSchema::CREATED_AT],
            $result[DriverWithdrawlTableSchema::UPDATED_AT]
        );
        $entity->setId($result[DriverWithdrawlTableSchema::ID]);
        $entity->setAmount((float) $result[DriverWithdrawlTableSchema::AMOUNT]);
        $entity->setStatus((int) $result[DriverWithdrawlTableSchema::STATUS]);
        return $entity;
    }
}
