<?php

class RejectDeliveryRequest extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $accept_delivery = $this->getAppDB()->getDelieveryDao()->getDelieveryWithDriverIdEntity($_POST[self::DRIVER_ID]);
        if($accept_delivery->isPending() == true){
            $accept_delivery->setPending(false);
        }

        $this->resSendOK([
            'delivery_accepted' => $accept_delivery->isPending()
        ]);
    }
}
