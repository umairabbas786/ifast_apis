<?php

class AdsEntity {
    const TABLE_NAME = "ads";

    private string $id;
    private string $uid;
    private string $driver_id;
    private string $driver_name;
    private string $location;
    private bool $availability_status;
    private string $vehicle_type;
    private bool $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id, string $driver_name, string $location, string $vehicle_type,  string $created_at, string $updated_at, bool $availability_status = false, bool $status = false) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->driver_name = $driver_name;
        $this->location = $location;
        $this->vehicle_type = $vehicle_type;
        $this->availability_status = $availability_status;
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

    public function getDriverName(): string {
        return $this->driver_name;
    }

    public function setDriverName(string $driver_name): void {
        $this->driver_name = $driver_name;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function setLocation(string $location): void {
        $this->location = $location;
    }

    public function getVehicleType(): string {
        return $this->vehicle_type;
    }

    public function setVehicleType(string $vehicle_type): void {
        $this->vehicle_type = $vehicle_type;
    }

    public function isAvailabilityStatus(): bool {
        return $this->availability_status;
    }

    public function setAvailabilityStatus(bool $availability_status = false): void {
        $this->availability_status = $availability_status;
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
