<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class CreateCustomerDepositRequest extends ElectroApi {

    const CUSTOMER_ID = "customer_id";
    const BALANCE = "balance";

    protected function onAssemble() {
        $required_fields = [
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

        $registration_time = Carbon::now();

        $stats = new CustomerDepositEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::CUSTOMER_ID],
            $registration_time,
            $registration_time,
            $_POST[self::BALANCE],
            0
        );

        $stats = $this->getAppDB()->getCustomerDepositDao()->insertCustomerDeposit($stats);

        if($stats === null){
            $this->killAsFailure([
                "failed_to_create_customer_deposit_request" => true
            ]);
        }

        $this->resSendOK([
            'customer_deposit_request'=>[
                CustomerDepositTableSchema::ID => $stats->getId(),
                CustomerDepositTableSchema::AMOUNT => $stats->getAmount(),
                CustomerDepositTableSchema::STATUS => $stats->getStatus(),
                CustomerDepositTableSchema::CREATED_AT => $stats->getCreatedAt()
            ]
        ]);
    }
}
