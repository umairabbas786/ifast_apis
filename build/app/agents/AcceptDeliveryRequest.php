<?php

class AcceptDeliveryRequest extends ElectroApi {

    const ID = "id";

    protected function onAssemble() {
        if (!isset($_POST[self::ID])) {
            $this->killAsBadRequestWithMissingParamException(self::ID);
        }
    }

    protected function onDevise() {
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->getDelieveryWithId($_POST[self::ID]);
        $accept_delivery->setPending(1);
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->updateDelievery($accept_delivery);

        if($accept_delivery === null){
            $this->killAsFailure([
                'unable_to_update_pending_status' => true
            ]);
        }

        $this->resSendOK([
            'delivery_accepted' => true
        ]);
    }
}
