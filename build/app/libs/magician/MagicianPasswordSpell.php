<?php

class MagicianPasswordSpell {
    private string $abracadabra; // this is hash
    private string $iv; // this is initialization vector
    private string $key; // this is key for ctr mode
    private string $cipher; // this is encrypted text

    public function __construct(string $abracadabra, string $iv, string $key, string $cipher) {
        $this->abracadabra = $abracadabra;
        $this->iv = $iv;
        $this->key = $key;
        $this->cipher = $cipher;
    }

    public function getAbracadabra(): string {
        return $this->abracadabra;
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