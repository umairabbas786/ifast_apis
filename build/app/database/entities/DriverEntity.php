<?php

class DriverEntity {
    const TABLE_NAME = "drivers";

    private string $id;
    private string $uid;
    private string $profile_picture;
    private string $full_name;
    private string $email;
    private string $date_of_birth;
    private string $country;
    private string $password;
    private string $proof;
    private string $email_code;
    private bool $email_verified;
    private bool $status;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $uid, string $profile_picture, string $full_name, string $email, string $date_of_birth, string $country, string $password, string $proof, string $email_code,  string $created_at, string $updated_at, bool $email_verified = false, bool $status = false) {
        $this->uid = $uid;
        $this->profile_picture = $profile_picture;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->date_of_birth = $date_of_birth;
        $this->country = $country;
        $this->password = $password;
        $this->proof = $proof;
        $this->email_code = $email_code;
        $this->email_verified = $email_verified;
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

    public function getProfilePicture(): string {
        return $this->profile_picture;
    }

    public function setProfilePicture(string $profile_picture): void {
        $this->profile_picture = $profile_picture;
    }

    public function getFullName(): string {
        return $this->full_name;
    }

    public function setFullName(string $full_name): void {
        $this->full_name = $full_name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getDateOfBirth(): string {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(string $date_of_birth): void {
        $this->date_of_birth = $date_of_birth;
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

    public function getProof(): string {
        return $this->proof;
    }

    public function setProof(string $proof): void {
        $this->proof = $proof;
    }

    public function getEmailCode(): string {
        return $this->email_code;
    }

    public function setEmailCode(string $email_code): void {
        $this->email_code = $email_code;
    }

    public function isEmailVerified(): bool {
        return $this->email_verified;
    }

    public function setEmailVerified(bool $email_verified = false): void {
        $this->email_verified = $email_verified;
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
