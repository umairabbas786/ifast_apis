<?php

class Driver_notificationEntity {
    const TABLE_NAME = "driver_notifications";

    private string $id;
    private string $uid;
    private string $driver_id;
    private string $msg;
    private bool $state;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id, string $msg,  string $created_at, string $updated_at, bool $state = false) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->msg = $msg;
        $this->state = $state;
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

    public function getDriverId(): string {
        return $this->driver_id;
    }

    public function setDriverId(string $driver_id): void {
        $this->driver_id = $driver_id;
    }

    public function getMsg(): string {
        return $this->msg;
    }

    public function setMsg(string $msg): void {
        $this->msg = $msg;
    }

    public function isState(): bool {
        return $this->state;
    }

    public function setState(bool $state = false): void {
        $this->state = $state;
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
