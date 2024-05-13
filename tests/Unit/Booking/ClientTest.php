<?php

use Staysvel\Stays;
use Tests\ValidationRuleTransformer;

dataset('search data validation rules', function ()
{
    $transformer = new ValidationRuleTransformer([
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'hasReservations' => 'boolean',
        'reservationFilter' => 'string|in:creation',
        'reservationFrom' => 'string|date_format:Y-m-d',
        'reservationTo' => 'string|date_format:Y-m-d',
        'sortBy' => 'string',
        'sort' => 'string',
        'skip' => 'integer',
        'limit' => 'integer',
    ]);

    return array_merge($transformer->toDataProvider(), [
        ['limit', ['limit' => '21'], 'max.numeric', ['max' => '20']],
    ]);
});

test('validate search method', function (
    string $invalidField,
    array $invalidData,
    string $errorKey,
    array $errorParams = [])
{
    $response = Stays::booking()->clients()->search($invalidData);

    $this->assertRequestNotSent('GET', '/booking/clients');
    $this->assertValidation($response, $invalidField, $errorKey, $errorParams);

})->with('search data validation rules');

test('search method', function ()
{
    $response = Stays::booking()->clients()->search();

    $this->assertRequest('GET', '/booking/clients', $response);
});

test('create method', function ()
{
    $response = Stays::booking()->clients()->create();

    $this->assertRequest('POST', '/booking/clients', $response);
});

test('get method', function ()
{
    $response = Stays::booking()->clients()->get('clientId');

    $this->assertRequest('GET', '/booking/clients/clientId', $response);
});

test('update method', function ()
{
    $response = Stays::booking()->clients()->update('clientId');

    $this->assertRequest('PATCH', '/booking/clients/clientId', $response);
});
