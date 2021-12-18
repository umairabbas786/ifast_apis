<?php

class ShowdriverWithdrawlRequest extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $deliveries = $this->getAppDB()->getDriverWithdrawlDao()
            ->getDriverWithdrawlWithDriverId($_POST[self::DRIVER_ID]);

        $deliver = [];
        /** @var DriverWithdrawlEntity $Delivery */
        foreach ($deliveries as $Delivery) {
            array_push($deliver, [
                DriverWithdrawlTableSchema::WITHDRAW_EMAIL => $Delivery->getWithdrawEmail(),
                DriverWithdrawlTableSchema::AMOUNT => $Delivery->getAmount(),
                DriverWithdrawlTableSchema::STATUS => $Delivery->getStatus(),
                DriverWithdrawlTableSchema::CREATED_AT => $Delivery->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'withdraw_history' => $deliver
        ]);
    }
}
