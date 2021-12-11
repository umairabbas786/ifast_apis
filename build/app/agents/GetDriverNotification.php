<?php

class GetDriverNotification extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {
        $Notifications = $this->getAppDB()->getDriver_notificationDao()
            ->getDriverNotificationWithDriverId($_POST[self::DRIVER_ID]);

        if(count($Notifications) === 0) {
            $this->killAsFailure([
                'no_data_found' => true
            ]);
        }

        $noti = [];

        foreach ($Notifications as $Notis) {
            array_push($noti, [
                Driver_notificationTableSchema::ID => $Notis->getId(),
                Driver_notificationTableSchema::MSG => $Notis->getMsg(),
                Driver_notificationTableSchema::STATE => $Notis->isState(),
                Driver_notificationTableSchema::CREATED_AT => $Notis->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'driver_notifications' => $noti
        ]);
    }
}
