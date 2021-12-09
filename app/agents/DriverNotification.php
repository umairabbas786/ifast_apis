<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class DriverNotification extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const MESSAGE = "message";

    protected function onAssemble() {
        $required_fields = [
            self::DRIVER_ID,
            self::MESSAGE
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();

        $Notifications = new Driver_notificationEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DRIVER_ID],
            $_POST[self::MESSAGE],
            $registration_time,
            $registration_time,
            false
        );

        $Notifications = $this->getAppDB()->getDriver_notificationDao()->insertDriver_notification($Notifications);

        if($Notifications === null){
            $this->killAsFailure([
                "failed_to_generate_notification" => true
            ]);
        }

        $this->resSendOK([
            'notification'=>[
                Driver_notificationTableSchema::ID => $Notifications->getId(),
                Driver_notificationTableSchema::DRIVER_ID => $Notifications->getDriverId(),
                Driver_notificationTableSchema::MSG => $Notifications->getMsg(),
                Driver_notificationTableSchema::STATE => $Notifications->isState(),
                Driver_notificationTableSchema::CREATED_AT => $Notifications->getCreatedAt(),
                Driver_notificationTableSchema::UPDATED_AT => $Notifications->getUpdatedAt()
            ]
        ]);
    }
}
