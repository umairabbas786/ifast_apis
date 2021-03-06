<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class PayToDriver extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const CUSTOMER_ID = "customer_id";
    const BALANCE = "balance";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::CUSTOMER_ID,
            self::BALANCE
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $customerbalance = $this->getAppDB()->getCustomerWalletDao()->getCustomerWalletWithCustomerId($_POST[self::CUSTOMER_ID]);
        if($_POST[self::BALANCE] > $customerbalance->getBalance()){
            $this->killAsFailure([
                'you_dont_have_enough_balance' => true
            ]);
        }

        $customerold = $customerbalance->getBalance();
        $amount = (float) $_POST[self::BALANCE];
        if($amount > $customerold){
            $this->killAsFailure([
                'not_enough_balance'=>true
            ]);
        }

        $customerbalance->setBalance($customerbalance->getBalance() - (float) $_POST[self::BALANCE]);
        $customerbalance = $this->getAppDB()->getCustomerWalletDao()->updateCustomerWallet($customerbalance);

//        $deliveries = $this->getAppDB()->getDriverPartnerDao()
//            ->getDriverPartnerWithDriverId($_POST[self::DRIVER_ID]);
//
//        $partners = [];
//        if (count($deliveries) === 1){ //split balance into 2
//            $payment = ((float) $_POST[self::BALANCE] * 50) / 100;
//            /** @var DriverPartnerEntity $delivery */
//            foreach($deliveries as $delivery){
//                $partners = $this->getAppDB()->getDriverWalletDao()->getDriverWalletWithDriverId($delivery->getPartnerId());
//                /** @var DriverWalletEntity $partner */
//                foreach ($partners as $partner){
//                    $old_balance = $partner->getBalance();
//                }
//            }
//        }
//        if (count($deliveries) === 2){ //split balance into 3
//
//        }
//        if (count($deliveries) === 3){ //split balance into 4
//
//        }

        /** @var DriverWalletEntity $wallet */
        $wallet = $this->getAppDB()->getDriverWalletDao()->getDriverWalletWithDriverIdEntity($_POST[self::DRIVER_ID]);
        if($wallet === null){
            $this->killAsFailure([
                'unable_to_find_wallet' => true
            ]);
        }

        $wallet->setBalance($wallet->getBalance() + (float) $_POST[self::BALANCE]);
        $wallet->setUpdatedAt(Carbon::now());
        $wallet = $this->getAppDB()->getDriverWalletDao()->updateDriverWallet($wallet);
        if($wallet === null){
            $this->killAsFailure([
                'fail_to_transfer_money'=>true
            ]);
        }
        $this->resSendOK([
            'bill_payed' => true
        ]);
    }
}
