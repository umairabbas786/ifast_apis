<?php

class ShowCustomerWallet extends ElectroApi {

    const CUSTOMER_ID = "customer_id";

    protected function onAssemble() {
        if (!isset($_POST[self::CUSTOMER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::CUSTOMER_ID);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getCustomerWalletDao()
            ->getCustomerWalletWithCustomerId($_POST[self::CUSTOMER_ID]);


        $this->resSendOK([
            'customer_balance' => [
                CustomerWalletTableSchema::BALANCE => $deliveries->getBalance()
            ]
        ]);
    }
}
