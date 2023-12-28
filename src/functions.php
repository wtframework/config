<?php

declare(strict_types=1);

namespace WTFramework\Config;

function config(
  string $key,
  mixed $default = null
): mixed
{

  return Config::get(
    key: $key,
    default: $default
  );

}