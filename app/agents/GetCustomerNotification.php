<?php

class GetCustomerNotification extends ElectroApi {

    const CUSTOMER_ID = "customer_id";

    protected function onAssemble() {
        if (!isset($_POST[self::CUSTOMER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::CUSTOMER_ID);
        }
    }

    protected function onDevise() {
        $Notifications = $this->getAppDB()->getCustomerNotificationDao()
            ->getCustomerNotificationWithCustomerId($_POST[self::CUSTOMER_ID]);

        if(count($Notifications) === 0) {
            $this->killAsFailure([
                'no_data_found' => true
            ]);
        }

        $noti = [];

        /** @var CustomerNotificationEntity $Notis */
        foreach ($Notifications as $Notis) {
            array_push($noti, [
                CustomerNotificationTableSchema::ID => $Notis->getId(),
                CustomerNotificationTableSchema::MSG => $Notis->getMsg(),
                CustomerNotificationTableSchema::STATE => $Notis->isState(),
                CustomerNotificationTableSchema::CREATED_AT => $Notis->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'customer_notifications' => $noti
        ]);
    }
}
