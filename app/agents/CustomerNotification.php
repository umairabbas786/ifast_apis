<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class CustomerNotification extends ElectroApi {

    const CUSTOMER_ID = "customer_id";
    const MESSAGE = "message";

    protected function onAssemble() {
        $required_fields = [
            self::CUSTOMER_ID,
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

        $Notifications = new CustomerNotificationEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::CUSTOMER_ID],
            $_POST[self::MESSAGE],
            $registration_time,
            $registration_time,
            false
        );

        $Notifications = $this->getAppDB()->getCustomerNotificationDao()->insertCustomerNotification($Notifications);

        if($Notifications === null){
            $this->killAsFailure([
                "failed_to_generate_notification" => true
            ]);
        }

        $this->resSendOK([
            'notification'=>[
                CustomerNotificationTableSchema::ID => $Notifications->getId(),
                CustomerNotificationTableSchema::CUSTOMER_ID => $Notifications->getCustomerId(),
                CustomerNotificationTableSchema::MSG => $Notifications->getMsg(),
                CustomerNotificationTableSchema::STATE => $Notifications->isState(),
                CustomerNotificationTableSchema::CREATED_AT => $Notifications->getCreatedAt(),
                CustomerNotificationTableSchema::UPDATED_AT => $Notifications->getUpdatedAt()
            ]
        ]);
    }
}
