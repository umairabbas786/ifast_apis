<?php

class PaymentGenerator extends ElectroApi {

    const MILES = "total_miles";
    const VEHICLE_TYPE = "vehicle_type";

    protected function onAssemble() {
        if (!isset($_POST[self::MILES])) {
            $this->killAsBadRequestWithMissingParamException(self::MILES);
        }
        if (!isset($_POST[self::VEHICLE_TYPE])) {
            $this->killAsBadRequestWithMissingParamException(self::VEHICLE_TYPE);
        }
    }

    protected function onDevise() {
        $total_balance = 0.0;

        if($_POST[self::VEHICLE_TYPE] == "car"){
            $total_balance = 1 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "small van"){
            $total_balance = 2.50 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "big van"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "small flatbed truck"){
            $total_balance = 2.20 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "large flatbed truck"){
            $total_balance = 2.70 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "small container truck"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "large container truck"){
            $total_balance = 3.50 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "heavy haul truck"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "small trailer truck"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        if($_POST[self::VEHICLE_TYPE] == "large trailer truck"){
            $total_balance = 3.70 * $_POST[self::MILES];
        }

        $this->resSendOK([
            'amount_to_be_paid' => $total_balance
        ]);
    }
}
