<?php

class RegisterCustomerEntity {
    const TABLE_NAME = "customers";

    private string $id;
    private string $uid;
    private string $profile_picture;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $country;
    private string $password;
    private bool $account_verified;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $profile_picture, string $first_name, string $last_name, string $email, string $country, string $password,  string $created_at, string $updated_at, bool $account_verified = false) {
        $this->uid = $uid;
        $this->profile_picture = $profile_picture;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->country = $country;
        $this->password = $password;
        $this->account_verified = $account_verified;
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

    public function getProfilePicture(): string {
        return $this->profile_picture;
    }

    public function setProfilePicture(string $profile_picture): void {
        $this->profile_picture = $profile_picture;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void {
        $this->first_name = $first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void {
        $this->last_name = $last_name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getCountry(): string {
        return $this->country;
    }

    public function setCountry(string $country): void {
        $this->country = $country;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function isAccountVerified(): bool {
        return $this->account_verified;
    }

    public function setAccountVerified(bool $account_verified = false): void {
        $this->account_verified = $account_verified;
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
