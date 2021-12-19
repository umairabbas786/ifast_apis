<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class UpdateDriverWallet extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const BALANCE = "balance";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::BALANCE
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        /** @var DriverWalletEntity $wallet */
        $wallet = $this->getAppDB()->getDriverWalletDao()->getDriverWalletWithDriverIdEntity($_POST[self::DRIVER_ID]);
        if($wallet === null){
            $this->killAsFailure([
                'unable_to_find_wallet' => true
            ]);
        }
        $oldAmount = $wallet->getBalance();
        $withdrawAmount = (float) $_POST[self::BALANCE];
        if($withdrawAmount > $oldAmount){
            $this->killAsFailure([
                'not_enough_balance'=>true
            ]);
        }

        $wallet->setBalance($wallet->getBalance() - (float) $_POST[self::BALANCE]);
        $wallet->setUpdatedAt(Carbon::now());
        $wallet = $this->getAppDB()->getDriverWalletDao()->updateDriverWallet($wallet);
        if($wallet === null){
            $this->killAsFailure([
                'fail_to_update_balance'=>true
            ]);
        }
        $this->resSendOK([
            'balance_updated' => true
        ]);
    }
}
