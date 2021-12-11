<?php

class DriverWalletEntity {
    const TABLE_NAME = "driver_wallet";

    private string $id;
    private string $uid;
    private string $driver_id;
    private float $balance;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id,  string $created_at, string $updated_at, float $balance = 0.0) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->balance = $balance;
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

    public function getBalance(): float {
        return $this->balance;
    }

    public function setBalance(float $balance = 0.0): void {
        $this->balance = $balance;
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
