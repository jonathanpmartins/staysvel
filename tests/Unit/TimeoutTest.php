<?php

use Staysvel\Http;
use Staysvel\Stays;

/**
 * Reads a private/protected property off an object. The connect/response
 * timeouts are transport-level options that Http::fake() does not expose on
 * the recorded request, so the object graph is the only observable sink.
 */
function readTimeout(object $object, string $property): int
{
    return (new ReflectionProperty($object, $property))->getValue($object);
}

afterEach(function ()
{
    // Stays holds the timeouts in static state — reset so this file does not
    // leak a mutated connect/response timeout into other tests.
    Stays::$timeout = 30;
    Stays::$connectTimeout = 10;
});

test('http defaults to a short connect timeout and a long response timeout', function ()
{
    $http = new Http();

    expect(readTimeout($http, 'timeout'))->toBe(30)
        ->and(readTimeout($http, 'connectTimeout'))->toBe(10);
});

test('http sets connect timeout independently from the response timeout', function ()
{
    $http = (new Http())->timeout(30)->connectTimeout(5);

    expect(readTimeout($http, 'timeout'))->toBe(30)
        ->and(readTimeout($http, 'connectTimeout'))->toBe(5);
});

test('timeout no longer forces the connect timeout to the same value', function ()
{
    $http = (new Http())->timeout(30);

    expect(readTimeout($http, 'timeout'))->toBe(30)
        ->and(readTimeout($http, 'connectTimeout'))->toBe(10);
});

test('connect timeout propagates through the Stays chain down to Http', function ()
{
    $client = Stays::timeout(30)->connectTimeout(5)->booking()->clients();

    expect(readTimeout($client, 'timeout'))->toBe(30)
        ->and(readTimeout($client, 'connectTimeout'))->toBe(5);

    $http = (fn () => $this->http())->call($client);

    expect(readTimeout($http, 'timeout'))->toBe(30)
        ->and(readTimeout($http, 'connectTimeout'))->toBe(5);
});
