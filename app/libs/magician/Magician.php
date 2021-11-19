<?php

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;

class Magician {
    private int $abracadabra_length = 15;

    function encrypt_password(string $password): MagicianPasswordSpell {
        $cipher = new AES('ctr');

        $random_iv = Random::string(16);
        $random_key = Random::string(16);

        $cipher->setIV($random_iv);
        $cipher->setKey($random_key);

        $abracadabra = $this->generate_abracadabra();

        $ciphertext = $cipher->encrypt($password . $abracadabra);
        return new MagicianPasswordSpell(
            $abracadabra,
            base64_encode($random_iv),
            base64_encode($random_key),
            base64_encode($ciphertext)
        );
    }

    function compare_password(MagicianPasswordSpell $magicianPasswordSpell, string $password): bool {
        $cipher = new AES('ctr');

        $cipher->setIV(base64_decode($magicianPasswordSpell->getIv()));
        $cipher->setKey(base64_decode($magicianPasswordSpell->getKey()));

        $abracadabra = $magicianPasswordSpell->getAbracadabra();

        $decrypted_password = $cipher->decrypt(base64_decode($magicianPasswordSpell->getCipher()));

        return $decrypted_password === ($password . $abracadabra);
    }

    function encrypt(string $payload): MagicianSpell {
        $cipher = new AES('ctr');

        $random_iv = Random::string(16);
        $random_key = Random::string(16);

        $cipher->setIV($random_iv);
        $cipher->setKey($random_key);

        $ciphertext = $cipher->encrypt($payload);
        return new MagicianSpell(
            base64_encode($random_iv),
            base64_encode($random_key),
            base64_encode($ciphertext)
        );
    }

    function decrypt(MagicianSpell $magicianSpell): bool {
        $cipher = new AES('ctr');

        $cipher->setIV(base64_decode($magicianSpell->getIv()));
        $cipher->setKey(base64_decode($magicianSpell->getKey()));

        return $cipher->decrypt(base64_decode($magicianSpell->getCipher()));
    }

    private function generate_abracadabra(): string {
        return bin2hex(openssl_random_pseudo_bytes($this->abracadabra_length));
    }
}
