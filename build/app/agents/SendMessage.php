<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class SendMessage extends ElectroApi {

    const SENDER_ID = "sender_id";
    const RECIPIENT_ID = "recipient_id";
    const MESSAGE = "message";

    protected function onAssemble() {
        if (!isset($_POST[self::SENDER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::SENDER_ID);
        }
        if (!isset($_POST[self::RECIPIENT_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::RECIPIENT_ID);
        }
        if (!isset($_POST[self::MESSAGE])) {
            $this->killAsBadRequestWithMissingParamException(self::MESSAGE);
        }
    }

    protected function onDevise() {

        $registration_time = Carbon::now();
        $driverConversation = new DriverConversationEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::SENDER_ID],
            $_POST[self::RECIPIENT_ID],
            $_POST[self::MESSAGE],
            $registration_time,
            $registration_time
        );
        $driverConversation = $this->getAppDB()->getDriverConversationDao()->insertDriverConversation($driverConversation);

        if($driverConversation === null){
            $this->killAsFailure([
                'failed_to_send_message' => true
            ]);
        }

        $this->resSendOK([
            'message_sent' => [
                DriverConversationTableSchema::ID => $driverConversation->getId(),
                DriverConversationTableSchema::SENDER_ID => $driverConversation->getSenderId(),
                DriverConversationTableSchema::RECIPIENT_ID => $driverConversation->getRecipientId(),
                DriverConversationTableSchema::MESSAGE => $driverConversation->getMessage(),
                DriverConversationTableSchema::CREATED_AT => $driverConversation->getCreatedAt(),
                DriverConversationTableSchema::UPDATED_AT => $driverConversation->getUpdatedAt()
            ]
        ]);
    }
}
