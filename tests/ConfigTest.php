<?php

declare(strict_types=1);

use WTFramework\Config\Config;

beforeEach(fn () => Config::set([]));

it('can set', function ()
{

  expect(Config::set([
    'foo' => 'bar'
  ]))
  ->toEqual([
    'foo' => 'bar'
  ]);

});

it('can get', function ()
{

  Config::set([
    'foo' => 'bar'
  ]);

  expect(Config::get('foo'))
  ->toEqual('bar');

});

it('can get default', function ()
{

  expect(Config::get(
    'foo',
    'default'
  ))
  ->toEqual('default');

});

it('can get nested', function ()
{

  Config::set([
    'foo' => [
      'bar' => 'baz'
    ]
  ]);

  expect(Config::get('foo.bar'))
  ->toEqual('baz');

});