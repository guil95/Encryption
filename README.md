# Encryption

# Encrypt
```php
/**
 * @param string $value
 * @return array
 */
$encrypt = (new Encryption('SECRET_KEY', 'SECRET_IV'))->encrypt($value);
// returns
/**
[
    ['encryption'] => 'U2NZUzRXUGdNQXhZb2JIYmpEbjV5UT09',
    ['secretKey'] => '9be3012dcf7250872a8f59ee7bec763da5f263fb2a4cdb23cea25bb105df915925663dfcb54cf1cad7e9d41b53437833bda9909eb1f3d4b3dfa24689f7036bea',
    ['iv'] => 'bc450f24e0553f98'
]
*/
```
# Decrypt
```php
/**
 * @param string $encrypt
 * @return string
 */
$decrypt = (new Encryption('SECRET_KEY', 'SECRET_IV'))->decrypt($encrypt);
```
