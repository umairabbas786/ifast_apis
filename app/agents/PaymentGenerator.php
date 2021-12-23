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

        if($_POST[self::VEHICLE_TYPE] == "car" || $_POST[self::VEHICLE_TYPE] == "Car"){
            $total_balance = 1 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "small van" || $_POST[self::VEHICLE_TYPE] == "Small Van" || $_POST[self::VEHICLE_TYPE] == "Small van"){
            $total_balance = 2.50 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "big van" || $_POST[self::VEHICLE_TYPE] == "Big Van" || $_POST[self::VEHICLE_TYPE] == "Big van"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "small flatbed truck" || $_POST[self::VEHICLE_TYPE] == "Small flatbed truck" || $_POST[self::VEHICLE_TYPE] == "Small Flatbed Truck"){
            $total_balance = 2.20 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "large flatbed truck" || $_POST[self::VEHICLE_TYPE] == "Large flatbed truck" || $_POST[self::VEHICLE_TYPE] == "Large Flatbed Truck"){
            $total_balance = 2.70 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "small container truck" || $_POST[self::VEHICLE_TYPE] == "Small container truck" || $_POST[self::VEHICLE_TYPE] == "Small container truck"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "large container truck" || $_POST[self::VEHICLE_TYPE] == "Large container truck" || $_POST[self::VEHICLE_TYPE] == "Large Container Truck"){
            $total_balance = 3.50 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "heavy haul truck" || $_POST[self::VEHICLE_TYPE] == "Heavy Haul Truck" || $_POST[self::VEHICLE_TYPE] == "Heavy haul truck"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "small trailer truck" || $_POST[self::VEHICLE_TYPE] == "Small Trailer Truck" || $_POST[self::VEHICLE_TYPE] == "Small trailer truck"){
            $total_balance = 3 * $_POST[self::MILES];
        }
        else if($_POST[self::VEHICLE_TYPE] == "large trailer truck" || $_POST[self::VEHICLE_TYPE] == "Large Trailer Truck" || $_POST[self::VEHICLE_TYPE] == "Large trailer truck"){
            $total_balance = 3.70 * $_POST[self::MILES];
        }
        else{
            $total_balance = 2 * $_POST[self::MILES];
        }

        $this->resSendOK([
            'amount_to_be_paid' => $total_balance
        ]);
    }
}
