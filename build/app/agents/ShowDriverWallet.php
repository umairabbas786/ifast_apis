<?php

class ShowDriverWallet extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getDriverWalletDao()
            ->getDriverWalletWithDriverId($_POST[self::DRIVER_ID]);

        $deliver = [];
        /** @var DriverWalletEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                DriverWalletTableSchema::BALANCE => $Delivery->getBalance()
            ]);
        }

        $this->resSendOK([
            'driver_balance' => $deliver
        ]);
    }
}
