<?php

declare(strict_types=1);

namespace WTFramework\Config;

class Config
{

  protected static array $config = [];

  private function __construct() {}

  public static function set(#[\SensitiveParameter] array $config): array
  {
    return self::$config = $config;
  }

  public static function get(
    string $key,
    mixed $default = null
  ): mixed
  {

    $parts = explode('.', $key);

    foreach ($parts as $part)
    {

      if (!array_key_exists($part, $config ??= self::$config))
      {
        return $default;
      }

      $config = $config[$part];

    }

    return $config;

  }

}