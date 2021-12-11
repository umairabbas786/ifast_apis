<?php

class DriverPartnerEntity {
    const TABLE_NAME = "driver_partners";

    private string $id;
    private string $uid;
    private string $driver_id;
    private string $partner_id;
    private string $partner_type;
    private bool $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $driver_id, string $partner_id, string $partner_type,  string $created_at, string $updated_at, bool $status = false) {
        $this->uid = $uid;
        $this->driver_id = $driver_id;
        $this->partner_id = $partner_id;
        $this->partner_type = $partner_type;
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

    public function getPartnerId(): string {
        return $this->partner_id;
    }

    public function setPartnerId(string $partner_id): void {
        $this->partner_id = $partner_id;
    }

    public function getPartnerType(): string {
        return $this->partner_type;
    }

    public function setPartnerType(string $partner_type): void {
        $this->partner_type = $partner_type;
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
