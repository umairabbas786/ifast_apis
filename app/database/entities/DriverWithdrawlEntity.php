<?php

class DriverWithdrawlEntity {
    const TABLE_NAME = "driver_withdraws";

    private string $id;
    private string $uid;
    private string $driver_id;
    private string $withdraw_email;
    private float $amount;
    private int $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id, string $withdraw_email,  string $created_at, string $updated_at, float $amount = 0.0, int $status = 0) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->withdraw_email = $withdraw_email;
        $this->amount = $amount;
        $this->status = $status;
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

    public function getWithdrawEmail(): string {
        return $this->withdraw_email;
    }

    public function setWithdrawEmail(string $withdraw_email): void {
        $this->withdraw_email = $withdraw_email;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function setAmount(float $amount = 0.0): void {
        $this->amount = $amount;
    }

    public function getStatus(): int {
        return $this->status;
    }

    public function setStatus(int $status = 0): void {
        $this->status = $status;
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
