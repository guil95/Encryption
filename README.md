# Encryption

# Encrypt
```php
/**
 * @param string $value
 * @return string
 */
$encrypt = (new Encryption('SECRET_KEY', 'SECRET_IV'))->encrypt($value);
```
# Decrypt
```php
/**
 * @param string $encrypt
 * @return string
 */
$decrypt = (new Encryption('SECRET_KEY', 'SECRET_IV'))->decrypt($encrypt);
```
