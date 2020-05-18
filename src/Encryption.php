<?php

declare(strict_types=1);

namespace Encryption;

final class Encryption
{
    const ENCRYPT_METHOD = 'AES-256-CBC';

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $iv;

    /**
     * Encryption constructor.
     * @param string|null $secretKey
     * @param string|null $iv
     */
    public function __construct(string $secretKey = null, string $iv = null)
    {
        if ($iv && strlen($iv) != 16) {
            throw new \RuntimeException('Invalid value for "iv"');
        }

        $this->key = $secretKey ?? hash('sha512', openssl_random_pseudo_bytes(16));
        $this->iv = $iv ?? substr(hash('sha512', openssl_random_pseudo_bytes(16)), 0, 16);
    }

    /**
     * @param string $value
     * @return array
     */
    public function encrypt(string $value): array
    {
        return [
            'encryption' => trim(
                base64_encode(
                    openssl_encrypt(
                        $value,
                        self::ENCRYPT_METHOD,
                        $this->key,
                        0,
                        $this->iv
                    )
                )
            ),
            'secretKey' => $this->key,
            'iv' => $this->iv
        ];
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
