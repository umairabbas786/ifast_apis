<?php

class ReadDriverNotification extends ElectroApi {
    const NOTIFICATION_ID = "notification_id";

    protected function onAssemble() {
        if (!isset($_POST[self::NOTIFICATION_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::NOTIFICATION_ID);
        }
    }

    protected function onDevise() {
        $notifications = $this->getAppDB()->getDriver_notificationDao()->getDriver_notificationWithId($_POST[self::NOTIFICATION_ID]);
        if($notifications->isState() === true){
            $notifications->setState(false);
        }
        else{
            $notifications->setState(true);
        }
        $notifications = $this->getAppDB()->getDriver_notificationDao()->updateDriver_notification($notifications);
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
