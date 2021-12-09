<?php

class DriverConversationEntity {
    const TABLE_NAME = "driver_conversations";

    private string $id;
    private string $uid;
    private string $sender_id;
    private string $recipient_id;
    private string $message;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $sender_id, string $recipient_id, string $message,  string $created_at, string $updated_at) {
        $this->uid = $uid;
        $this->sender_id = $sender_id;
        $this->recipient_id = $recipient_id;
        $this->message = $message;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        }

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function getUid(): string {
        return $this->uid;
    }

    public function setUid(string $uid): void {
        $this->uid = $uid;
    }

    public function getSenderId(): string {
        return $this->sender_id;
    }

    public function setSenderId(string $sender_id): void {
        $this->sender_id = $sender_id;
    }

    public function getRecipientId(): string {
        return $this->recipient_id;
    }

    public function setRecipientId(string $recipient_id): void {
        $this->recipient_id = $recipient_id;
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void {
        $this->updated_at = $updated_at;
    }
}
