<?php

require_once '../vendor/autoload.php';

use App\Encryption;

$encrypt = (new Encryption())->encrypt($argv[1]);

print_r($encrypt.PHP_EOL);

$decrypt = (new Encryption())->decrypt($encrypt);

print_r($decrypt.PHP_EOL);