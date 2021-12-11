<?php

class RejectDeliveryRequest extends ElectroApi {

    const ID = "id";

    protected function onAssemble() {
        if (!isset($_POST[self::ID])) {
            $this->killAsBadRequestWithMissingParamException(self::ID);
        }
    }

    protected function onDevise() {
        $reject_delivery = $this->getAppDB()->getDelieveryDao()->getDelieveryWithId($_POST[self::ID]);
        $reject_delivery->setPending(2);
        $reject_delivery = $this->getAppDB()->getDelieveryDao()->updateDelievery($reject_delivery);

        if($reject_delivery === null){
            $this->killAsFailure([
                'unable_to_update_pending_status' => true
            ]);
        }

        $this->resSendOK([
            'delivery_rejected' => true
        ]);
    }
}
