# Encryption

# Encrypt
//@param string $value
$encrypt = (new Encryption())->encrypt($value);

# Decrypt
//@return string
$decrypt = (new Encryption())->decrypt($encrypt);
