<?php

namespace Encryption;

final class Encryption
{
    const ENCRYPT_METHOD = 'AES-256-CBC';
    
    private $key;
    private $iv;

    public function __construct(string $secretKey, string $secretIv)
    {
        $this->key = hash('sha512', $secretKey);
        $this->iv = substr(hash('sha512', $secretIv), 0, 16);
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
