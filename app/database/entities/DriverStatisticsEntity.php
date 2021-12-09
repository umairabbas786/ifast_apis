<?php

class DriverStatisticsEntity {
    const TABLE_NAME = "driver_statistics";

    private string $id;
    private string $uid;
    private string $driver_id;
    private int $completed_deliveries;
    private int $driver_level;
    private float $success_rating;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id,  string $created_at, string $updated_at, int $completed_deliveries = 0, int $driver_level = 0, float $success_rating = 0.0) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->completed_deliveries = $completed_deliveries;
        $this->driver_level = $driver_level;
        $this->success_rating = $success_rating;
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

    public function getCompletedDeliveries(): int {
        return $this->completed_deliveries;
    }

    public function setCompletedDeliveries(int $completed_deliveries = 0): void {
        $this->completed_deliveries = $completed_deliveries;
    }

    public function getDriverLevel(): int {
        return $this->driver_level;
    }

    public function setDriverLevel(int $driver_level = 0): void {
        $this->driver_level = $driver_level;
    }

    public function getSuccessRating(): float {
        return $this->success_rating;
    }

    public function setSuccessRating(float $success_rating = 0.0): void {
        $this->success_rating = $success_rating;
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
