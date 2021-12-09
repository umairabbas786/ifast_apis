<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class CreateDriverStats extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $stats = new DriverStatisticsEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $registration_time,
            $registration_time,
            0,
            0,
            0
        );

        $stats = $this->getAppDB()->getDriverStatisticsDao()->insertDriverStatistics($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_driver_statistics" => true
            ]);
        }

        $this->resSendOK([
            'driver_statistics'=>[
                DriverStatisticsTableSchema::ID => $stats->getId(),
                DriverStatisticsTableSchema::DRIVER_LEVEL => $stats->getDriverLevel(),
                DriverStatisticsTableSchema::SUCCESS_RATING => $stats->getSuccessRating(),
                DriverStatisticsTableSchema::COMPLETED_DELIVERIES => $stats->getCompletedDeliveries()
            ]
        ]);
    }
}
