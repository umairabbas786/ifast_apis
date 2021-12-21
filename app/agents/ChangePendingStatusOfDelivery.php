<?php

class ChangePendingStatusOfDelivery extends ElectroApi {

    const ID = "id";
    const STATUS = "status";

    protected function onAssemble() {
        if (!isset($_POST[self::ID])) {
            $this->killAsBadRequestWithMissingParamException(self::ID);
        }
        if(!isset($_POST[self::STATUS])){
            $this->killAsBadRequestWithMissingParamException(self::STATUS);
        }
    }

    protected function onDevise() {
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->getDelieveryWithId($_POST[self::ID]);
        $accept_delivery->setPending($_POST[self::STATUS]);
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->updateDelievery($accept_delivery);

        if($accept_delivery === null){
            $this->killAsFailure([
                'unable_to_update_pending_status' => true
            ]);
        }

        $this->resSendOK([
            'pending_status' => $accept_delivery->getPending()
        ]);
    }
}
