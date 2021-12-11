<?php

class ConfirmDeliveryEntity {
    const TABLE_NAME = "confirm_delivery";

    private string $id;
    private string $uid;
    private string $delivery_id;
    private string $customer_id;
    private string $driver_id;
    private string $location;
    private string $number_plate;
    private string $face;
    private string $before_items;
    private string $after_items;
    private string $confirmed;
    private bool $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $delivery_id, string $customer_id, string $driver_id, string $location, string $number_plate, string $face, string $before_items, string $after_items, string $confirmed,  string $created_at, string $updated_at, bool $status = false) {
        $this->uid = $uid;
        $this->delivery_id = $delivery_id;
        $this->customer_id = $customer_id;
        $this->driver_id = $driver_id;
        $this->location = $location;
        $this->number_plate = $number_plate;
        $this->face = $face;
        $this->before_items = $before_items;
        $this->after_items = $after_items;
        $this->confirmed = $confirmed;
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

    public function getDeliveryId(): string {
        return $this->delivery_id;
    }

    public function setDeliveryId(string $delivery_id): void {
        $this->delivery_id = $delivery_id;
    }

    public function getCustomerId(): string {
        return $this->customer_id;
    }

    public function setCustomerId(string $customer_id): void {
        $this->customer_id = $customer_id;
    }

    public function getDriverId(): string {
        return $this->driver_id;
    }

    public function setDriverId(string $driver_id): void {
        $this->driver_id = $driver_id;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function setLocation(string $location): void {
        $this->location = $location;
    }

    public function getNumberPlate(): string {
        return $this->number_plate;
    }

    public function setNumberPlate(string $number_plate): void {
        $this->number_plate = $number_plate;
    }

    public function getFace(): string {
        return $this->face;
    }

    public function setFace(string $face): void {
        $this->face = $face;
    }

    public function getBeforeItems(): string {
        return $this->before_items;
    }

    public function setBeforeItems(string $before_items): void {
        $this->before_items = $before_items;
    }

    public function getAfterItems(): string {
        return $this->after_items;
    }

    public function setAfterItems(string $after_items): void {
        $this->after_items = $after_items;
    }

    public function getConfirmed(): string {
        return $this->confirmed;
    }

    public function setConfirmed(string $confirmed): void {
        $this->confirmed = $confirmed;
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
