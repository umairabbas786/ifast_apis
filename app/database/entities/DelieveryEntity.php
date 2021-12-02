<?php

class DelieveryEntity {
    const TABLE_NAME = "delivery";

    private string $id;
    private string $uid;
    private string $customer_id;
    private string $driver_id;
    private string $item_names;
    private string $description;
    private string $pickup_location;
    private string $delivery_destination;
    private string $date_of_delivery;
    private string $pickup_time;
    private string $vehicle_type;
    private string $items_weight;
    private string $instructions;
    private string $pending;
    private bool $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $customer_id, string $driver_id, string $item_names, string $description, string $pickup_location, string $delivery_destination, string $date_of_delivery, string $pickup_time, string $vehicle_type, string $items_weight, string $instructions, string $pending,  string $created_at, string $updated_at, bool $status = false) {
        $this->uid = $uid;
        $this->customer_id = $customer_id;
        $this->driver_id = $driver_id;
        $this->item_names = $item_names;
        $this->description = $description;
        $this->pickup_location = $pickup_location;
        $this->delivery_destination = $delivery_destination;
        $this->date_of_delivery = $date_of_delivery;
        $this->pickup_time = $pickup_time;
        $this->vehicle_type = $vehicle_type;
        $this->items_weight = $items_weight;
        $this->instructions = $instructions;
        $this->pending = $pending;
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

    public function getItemNames(): string {
        return $this->item_names;
    }

    public function setItemNames(string $item_names): void {
        $this->item_names = $item_names;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getPickupLocation(): string {
        return $this->pickup_location;
    }

    public function setPickupLocation(string $pickup_location): void {
        $this->pickup_location = $pickup_location;
    }

    public function getDeliveryDestination(): string {
        return $this->delivery_destination;
    }

    public function setDeliveryDestination(string $delivery_destination): void {
        $this->delivery_destination = $delivery_destination;
    }

    public function getDateOfDelivery(): string {
        return $this->date_of_delivery;
    }

    public function setDateOfDelivery(string $date_of_delivery): void {
        $this->date_of_delivery = $date_of_delivery;
    }

    public function getPickupTime(): string {
        return $this->pickup_time;
    }

    public function setPickupTime(string $pickup_time): void {
        $this->pickup_time = $pickup_time;
    }

    public function getVehicleType(): string {
        return $this->vehicle_type;
    }

    public function setVehicleType(string $vehicle_type): void {
        $this->vehicle_type = $vehicle_type;
    }

    public function getItemsWeight(): string {
        return $this->items_weight;
    }

    public function setItemsWeight(string $items_weight): void {
        $this->items_weight = $items_weight;
    }

    public function getInstructions(): string {
        return $this->instructions;
    }

    public function setInstructions(string $instructions): void {
        $this->instructions = $instructions;
    }

    public function getPending(): string {
        return $this->pending;
    }

    public function setPending(string $pending): void {
        $this->pending = $pending;
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
