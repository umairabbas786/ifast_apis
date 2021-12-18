<?php

class SetPendingToFour extends ElectroApi {
    const ID = "id";

    protected function onAssemble() {
        if (!isset($_POST[self::ID])) {
            $this->killAsBadRequestWithMissingParamException(self::ID);
        }
    }

    protected function onDevise() {
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->getDelieveryWithId($_POST[self::ID]);
        $accept_delivery->setPending(4);
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->updateDelievery($accept_delivery);

        if($accept_delivery === null){
            $this->killAsFailure([
                'unable_to_update_pending_status' => true
            ]);
        }

        $this->resSendOK([
            'delivery_pending_status_set_to_4' => true
        ]);
    }
}
