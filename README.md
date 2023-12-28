# What the Framework?! config

## Installation
```bash
composer require wtframework/config
```

## Documentation
Use the `set` static method to set the configuration settings.

If you pass an array as the first parameter then this will replace all existing settings.
```php
use WTFramework\Config\Config;

Config::set(['key1' => 'value1']);
```
\
If you pass a string as the first parameter and any value as the second parameter then this will add the setting to the existing settings.
```php
Config::set('key2', 'value2');
```
\
Dot notation can be used to set a nested value.
```php
Config::set(['key1' => ['key2' => 'value2']]);

Config::set('key1.key3', 'value3');
```
\
Use the `get` static method to return a configuration setting.

If the setting does not exist then it will return `null` or the value passed as the second parameter.
```php
Config::set(['key1' => 'value']);

// Returns 'value'
$key1 = Config::get('key1');

// Returns null
$key2 = Config::get('key2');

// Returns 0
$key3 = Config::get('key3', 0);
```
\
Dot notation can be used to return a nested value.
```php
Config::set(['key1' => ['key2' => 'value']]);

// Returns 'value'
$key2 = Config::get('key1.key2');
```
\
A `config` function is also provided as a wrapper around `Config::get`:
```php
use function WTFramework\Config\config;

$key = config('key', 'default');
```