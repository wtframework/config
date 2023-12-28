<?php

declare(strict_types=1);

use WTFramework\Config\Config;

use function WTFramework\Config\config;

beforeEach(fn () => Config::set([]));

it('can set', function ()
{

  expect(Config::set(['a' => 'b']))
  ->toBe(['a' => 'b']);

});

it('can set nested', function ()
{

  Config::set(['a' => ['b' => 'c']]);

  expect(Config::set('a.d', 'e'))
  ->toBe(['a' => [
    'b' => 'c',
    'd' => 'e',
  ]]);

});

it('can get', function ()
{

  Config::set(['a' => 'b']);

  expect(Config::get('a'))
  ->toBe('b');

});

it('can get default', function ()
{

  expect(Config::get('a'))
  ->toBe(null);

  expect(Config::get('a', 'b'))
  ->toBe('b');

});

it('can get nested', function ()
{

  Config::set(['a' => ['b' => 'c']]);

  expect(Config::get('a.b'))
  ->toBe('c');

});

it('can use function', function ()
{

  Config::set(['a' => ['b' => 'c']]);

  expect(config('a.b'))
  ->toBe('c');

  expect(config('b'))
  ->toBe(null);

  expect(config('b', false))
  ->toBe(false);

});