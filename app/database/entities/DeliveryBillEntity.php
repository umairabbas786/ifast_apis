<?php

class DeliveryBillEntity {
    const TABLE_NAME = "delivery_bills";

    private string $id;
    private string $uid;
    private string $driver_id;
    private string $customer_id;
    private string $delivery_id;
    private float $miles;
    private float $payment;
    private bool $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id, string $customer_id, string $delivery_id,  string $created_at, string $updated_at, float $miles = 0.0, float $payment = 0.0, bool $status = false) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->customer_id = $customer_id;
        $this->delivery_id = $delivery_id;
        $this->miles = $miles;
        $this->payment = $payment;
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

    public function getCustomerId(): string {
        return $this->customer_id;
    }

    public function setCustomerId(string $customer_id): void {
        $this->customer_id = $customer_id;
    }

    public function getDeliveryId(): string {
        return $this->delivery_id;
    }

    public function setDeliveryId(string $delivery_id): void {
        $this->delivery_id = $delivery_id;
    }

    public function getMiles(): float {
        return $this->miles;
    }

    public function setMiles(float $miles = 0.0): void {
        $this->miles = $miles;
    }

    public function getPayment(): float {
        return $this->payment;
    }

    public function setPayment(float $payment = 0.0): void {
        $this->payment = $payment;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function setStatus(bool $status = false): void {
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
