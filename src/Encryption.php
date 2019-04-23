<?php

namespace App;

class Encryption
{
    const SECRET_KEY = '5B064F6D0374F491C5972ACAFDEBC14B23BCCE5C7C831C31023C07DC0872624E';
    const SECRET_IV = '7A0AFDB3C64B9B5EDE3DFF9E95BC29AE';
    const ENCRYPT_METHOD = 'AES-256-CBC';

    private $key;
    private $iv;

    public function __construct()
    {
        $this->key = hash('sha256', self::SECRET_KEY);
        $this->iv = substr(hash('sha256', self::SECRET_IV), 0, 16);
    }

    /**
     * @param string $value
     * @return string
     */
    public function encrypt(string $value): string
    {
        return trim(
            base64_encode(
                openssl_encrypt(
                    $value,
                    self::ENCRYPT_METHOD,
                    $this->key,
                    0,
                    $this->iv
                )
            )
        );
    }

    /**
     * @param string $value
     * @return string
     */
    public function decrypt(string $value): string
    {
        return trim(
            openssl_decrypt(
                base64_decode($value),
                self::ENCRYPT_METHOD,
                $this->key,
                0,
                $this->iv
            )
        );
    }
}
