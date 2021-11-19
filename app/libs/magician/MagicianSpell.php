<?php

class MagicianSpell {
    private string $iv; // this is initialization vector
    private string $key; // this is key for ctr mode
    private string $cipher; // this is encrypted text

    public function __construct(string $iv, string $key, string $cipher) {
        $this->iv = $iv;
        $this->key = $key;
        $this->cipher = $cipher;
    }

    public function getIv(): string {
        return $this->iv;
    }

    public function getKey(): string {
        return $this->key;
    }

    public function getCipher(): string {
        return $this->cipher;
    }
}