<?php

class FetchChatConversations extends ElectroApi {

    const DRIVER_ID = "driver_id";
    const RECIPIENT_ID = "recipient_id";

    protected function onAssemble() {
        if (!isset($_POST[self::DRIVER_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::DRIVER_ID);
        }
        if (!isset($_POST[self::RECIPIENT_ID])) {
            $this->killAsBadRequestWithMissingParamException(self::RECIPIENT_ID);
        }
    }

    protected function onDevise() {

        $all_conversations = $this->getAppDB()->getDriverConversationDao()->getAllConversations($_POST[self::DRIVER_ID],$_POST[self::RECIPIENT_ID]);

        $convo = [];
        /** @var DriverConversationEntity $all_conversation */
        foreach($all_conversations as $all_conversation){
            array_push($convo , [
                DriverConversationTableSchema::ID => $all_conversation->getId(),
                DriverConversationTableSchema::SENDER_ID => $all_conversation->getSenderId(),
                DriverConversationTableSchema::RECIPIENT_ID => $all_conversation->getRecipientId(),
                DriverConversationTableSchema::MESSAGE => $all_conversation->getMessage(),
                DriverConversationTableSchema::CREATED_AT => $all_conversation->getCreatedAt()
            ]);
        }

        $this->resSendOK([
            'conversation' => $convo
        ]);
    }
}
