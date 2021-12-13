<?php

class ReadCustomerNotification extends ElectroApi {

    const NOTIFICATION_ID = "notification_id";

    protected function onAssemble() {
        if (!isset($_POST[self::NOTIFICATION_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::NOTIFICATION_ID);
        }
    }

    protected function onDevise() {
        $notifications = $this->getAppDB()->getCustomerNotificationDao()->getCustomerNotificationWithId($_POST[self::NOTIFICATION_ID]);
        if($notifications->isState() === true){
            $notifications->setState(false);
        }
        else{
            $notifications->setState(true);
        }
        $notifications = $this->getAppDB()->getCustomerNotificationDao()->updateCustomerNotification($notifications);
        if($notifications === null) {
            $this->killAsFailure([
                'failed_to_mark_as_read' => true
            ]);
        }

        $this->resSendOK([
            'Notification_marked_as_read'=> true
        ]);
    }
}
