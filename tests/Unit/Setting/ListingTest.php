<?php

use Staysvel\Stays;

test('list price setting', function ()
{
    $response = Stays::setting()->listing()->price('listingId');

    $this->assertRequest('GET', '/settings/listing/listingId/sellprice', $response);
});

test('list booking setting', function ()
{
    $response = Stays::setting()->listing()->booking('listingId');

    $this->assertRequest('GET', '/settings/listing/listingId/booking', $response);
});

test('list house rules', function ()
{
    $response = Stays::setting()->listing()->houseRules()->get('listingId');

    $this->assertRequest('GET', '/settings/listing/listingId/house-rules', $response);
});

test('update house rules', function ()
{
    $response = Stays::setting()->listing()->houseRules()->update('listingId');

    $this->assertRequest('PATCH', '/settings/listing/listingId/house-rules', $response);
});
