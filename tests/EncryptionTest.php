<?php
declare(strict_types=1);

namespace Tests;

use Encryption\Encryption;
use PHPUnit\Framework\TestCase;

final class EncryptionTest extends TestCase
{
    public function testInvalidIvLessThanSixteen()
    {
        $this->expectException(\RuntimeException::class);
        new Encryption('abc','abc');
    }

    public function testInvalidIvGretterThanSixteen()
    {
        $this->expectException(\RuntimeException::class);
        new Encryption('abc','abc');
    }

    public function testGenerateEncryptByConstructorParams()
    {
        $encryption = (new Encryption(
            'secret',
            'stringsBySixteen'
        ))->encrypt('Guilherme');

        self::assertArrayHasKey('encryption',$encryption);
        self::assertArrayHasKey('secretKey',$encryption);
        self::assertArrayHasKey('iv',$encryption);
    }

    public function testGenerateEncryptEmptyConstructorParams()
    {
        $encryption = (new Encryption())->encrypt('Guilherme');

        self::assertArrayHasKey('encryption',$encryption);
        self::assertArrayHasKey('secretKey',$encryption);
        self::assertArrayHasKey('iv',$encryption);
    }

    public function testDecryptByReturnFromEncrypt()
    {
        $name = 'Guilherme';

        $encryption = (new Encryption())->encrypt($name);

        self::assertArrayHasKey('encryption', $encryption);
        self::assertArrayHasKey('secretKey', $encryption);
        self::assertArrayHasKey('iv', $encryption);

        $decrypt = (new Encryption($encryption['secretKey'], $encryption['iv']))->decrypt($encryption['encryption']);

        self::assertEquals($name, $decrypt);
    }
}