<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class CreateDriverWithdrawlRequest extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const EMAIL = "paypal_email";
    const BALANCE = "balance";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::EMAIL,
            self::BALANCE
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $stats = new DriverWithdrawlEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $_POST[self::EMAIL],
            $registration_time,
            $registration_time,
            $_POST[self::BALANCE],
            0
        );

//        /** @var DriverWalletEntity $wallet */
//        $wallet = $this->getAppDB()->getDriverWalletDao()->getDriverWalletWithDriverId($_POST[self::DRIVER_ID]);
//        $oldAmount = $wallet->getBalance();
//        $withdrawAmount = (float) $_POST[self::BALANCE];
//        if($withdrawAmount > $oldAmount){
//            $this->killAsFailure([
//                'not_enough_balance'=>true
//            ]);
//        }
//
//        $wallet->setBalance($wallet->getBalance() - (float) $_POST[self::BALANCE]);
//        $wallet->setUpdatedAt(Carbon::now());
//        $wallet = $this->getAppDB()->getDriverWalletDao()->updateDriverWallet($wallet);
//        if($wallet === null){
//            $this->killAsFailure([
//                'fail_to_update_balance'=>true
//            ]);
//        }

        $stats = $this->getAppDB()->getDriverWithdrawlDao()->insertDriverWithdrawl($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_driver_withdraw_request" => true
            ]);
        }

        $this->resSendOK([
            'driver_wallet'=>[
                DriverWithdrawlTableSchema::ID => $stats->getId(),
                DriverWithdrawlTableSchema::AMOUNT => $stats->getAmount(),
                DriverWithdrawlTableSchema::WITHDRAW_EMAIL => $stats->getWithdrawEmail(),
                DriverWithdrawlTableSchema::STATUS => $stats->getStatus(),
                DriverWithdrawlTableSchema::CREATED_AT => $stats->getCreatedAt()
            ]
        ]);
    }
}
