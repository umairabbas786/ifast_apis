<?php

class CreateDriverWallet extends ElectroApi {

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

        $stats = new DriverWalletEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $registration_time,
            $registration_time,
            0.0
        );

        $stats = $this->getAppDB()->getDriverWalletDao()->insertDriverWallet($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_driver_wallet" => true
            ]);
        }

        $this->resSendOK([
            'driver_wallet'=>[
                DriverWalletTableSchema::ID => $stats->getId(),
                DriverWalletTableSchema::BALANCE => $stats->getBalance()
            ]
        ]);
    }
}
