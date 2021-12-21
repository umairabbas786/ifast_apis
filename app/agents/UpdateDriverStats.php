<?php

class UpdateDriverStats extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const POINTS = "points";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
        if (!isset($_POST[self::POINTS])){
            $this->killAsBadRequestWithMissingParamException(self::POINTS);
        }
    }

    protected function onDevise() {

        $statistics = $this->getAppDB()->getDriverStatisticsDao()->getDriverStatisticsWithDriverID($_POST[self::DRIVER_ID]);
        $rating = $statistics->getSuccessRating();
        $total_points = 50;
        $points = 0.0;
        if($rating == 5){
            $points = 50;
        }else if($rating == 4){
            $points = 40;
        }else if($rating == 3){
            $points = 30;
        }else if($rating == 2){
            $points = 20;
        }else if($rating == 1){
            $points = 10;
        }else if($rating == 0){
            $points = 0;
        }

        if($rating == 0){
            $current_rating = $_POST[self::POINTS] / 10;
        }
        else {
            $current_rating = ($points + $_POST[self::POINTS]) / 20;
        }
        $statistics->setSuccessRating($current_rating);

        $statistics = $this->getAppDB()->getDriverStatisticsDao()->updateDriverStatistics($statistics);
        if($statistics === null){
            $this->killAsFailure([
                'failed_to_update_rating' => true
            ]);
        }

        $this->resSendOK([
            'driver_rating' => [
                DriverStatisticsTableSchema::SUCCESS_RATING => $statistics->getSuccessRating()
            ]
        ]);
    }
}
