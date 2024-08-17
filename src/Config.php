<?php

declare(strict_types=1);

namespace WTFramework\Config;

abstract class Config
{

  protected static array $config = [];

  public static function set(
    #[\SensitiveParameter] string|array $config,
    #[\SensitiveParameter] mixed $value = null
  ): array
  {

    if (is_array($config))
    {
      return static::$config = $config;
    }

    $key = &static::$config;

    foreach (explode('.', $config) as $part)
    {
      $key = &$key[$part];
    }

    $key = $value;

    return static::$config;

  }

  public static function get(
    string $key,
    #[\SensitiveParameter] mixed $default = null
  ): mixed
  {

    foreach (explode('.', $key) as $part)
    {

      if (!array_key_exists($part, $config ??= static::$config))
      {
        return $default;
      }

      $config = $config[$part];

    }

    return $config;

  }

}