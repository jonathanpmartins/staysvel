<?php

use Staysvel\Stays;

test('list method', function ()
{
    $response = Stays::content()->rooms()->list('listingId');

    $this->assertRequest('GET', '/content/listing-rooms/listingId', $response);
});

test('create method', function ()
{
    $response = Stays::content()->rooms()->create('listingId');

    $this->assertRequest('POST', '/content/listing-rooms/listingId', $response);
});

test('get method', function ()
{
    $response = Stays::content()->rooms()->get('listingId', 'roomId');

    $this->assertRequest('GET', '/content/listing-rooms/listingId/roomId', $response);
});

test('update method', function ()
{
    $response = Stays::content()->rooms()->update('listingId', 'roomId');

    $this->assertRequest('PATCH', '/content/listing-rooms/listingId/roomId', $response);
});

test('delete method', function ()
{
    $response = Stays::content()->rooms()->delete('listingId', 'roomId');

    $this->assertRequest('DELETE', '/content/listing-rooms/listingId/roomId', $response);
});
