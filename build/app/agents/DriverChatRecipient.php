<?php

class DriverChatRecipient extends ElectroApi {

    const DRIVER_ID = "driver_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
    }

    protected function onDevise() {

        $driverEntity = $this->getAppDB()->getDriverDao()->getDriverWithId($_POST[self::DRIVER_ID]);

        if ($driverEntity === null) {
            $this->killAsFailure([
                'driver_not_found' => true
            ]);
        }

        $my_chats = $this->getAppDB()->getDriverConversationDao()->getAllDriverConversation();

        $recipients = [];
        $uniqueRecipients = [];

        /** @var DriverConversationEntity $my_chat */
        foreach ($my_chats as $my_chat) {
            $recipientId = "";
            if ($my_chat->getSenderId() == $_POST[self::DRIVER_ID]) {
                $recipientId = $my_chat->getRecipientId();
            } else {
                $recipientId = $my_chat->getSenderId();
            }

            $recipient = $this->getAppDB()->getDriverDao()->getDriverWithId($recipientId);

            if ($recipient !== null) {
                array_push($recipients, [
                    DriverTableSchema::ID => $recipient->getId(),
                    DriverTableSchema::FULL_NAME => $recipient->getFullName(),
                    DriverTableSchema::PROFILE_PICTURE => $this->createLinkForDriverImage($recipient->getProfilePicture())
                ]);
            }
        }

        foreach ($recipients as $recipient){
            $found = false;
            foreach ($uniqueRecipients as $uniqueRecipient) {
                if ($uniqueRecipient[DriverTableSchema::ID]  === $recipient[DriverTableSchema::ID] ) {
                    $found = true;
                    break;
                }
            }
            if(!$found){
                array_push($uniqueRecipients ,$recipient);
            }
        }

        $this->resSendOK([
            'recipients' => $uniqueRecipients
        ]);
    }
}
