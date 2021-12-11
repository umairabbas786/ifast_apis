<?php

class StatsDriver extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {

        $statistics = $this->getAppDB()->getDriverStatisticsDao()->getDriverStatisticsWithDriverID($_POST[self::DRIVER_ID]);
        $abc = $this->getAppDB()->getDriverDao()->getDriverWithId($_POST[self::DRIVER_ID]);


        $this->resSendOK([
            'stats' => [
                DriverStatisticsTableSchema::ID => $statistics->getId(),
                DriverTableSchema::STATUS => $abc->isStatus(),
                DriverStatisticsTableSchema::DRIVER_LEVEL => $statistics->getDriverLevel(),
                DriverStatisticsTableSchema::SUCCESS_RATING => $statistics->getSuccessRating(),
                DriverStatisticsTableSchema::COMPLETED_DELIVERIES => $statistics->getCompletedDeliveries()
            ]
        ]);
    }
}
