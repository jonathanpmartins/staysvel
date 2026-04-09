<?php

use Staysvel\Stays;
use Tests\ValidationRuleTransformer;

dataset('guest search validation rules', function ()
{
    $transformer = new ValidationRuleTransformer([
        'from' => 'required|string|date_format:Y-m-d',
        'to' => 'required|string|date_format:Y-m-d',
        'limit' => 'integer',
        'page' => 'integer',
        'clientId' => 'string',
        'listingId' => 'string',
        'reserveId' => 'string',
    ]);

    return array_merge($transformer->toDataProvider(), [
        ['limit', ['from' => '2024-01-01', 'to' => '2024-12-31', 'limit' => 101], 'max.numeric', ['max' => '100']],
    ]);
});

dataset('guest create validation rules', function ()
{
    $transformer = new ValidationRuleTransformer([
        'day' => 'required|string|date_format:Y-m-d',
        'cleaningRating' => 'required|numeric',
        'checkinRating' => 'required|numeric',
        'checkoutRating' => 'required|numeric',
        'reservationRating' => 'required|numeric',
        'maintenanceRating' => 'required|numeric',
        'treatmentRating' => 'required|numeric',
        'rating' => 'required|numeric',
        'positiveTraits' => 'required|string',
        'negativeTraits' => 'required|string',
        'reviewText' => 'required|string',
        'clientName' => 'string',
        'clientId' => 'string',
        'partnerId' => 'string',
        'listingId' => 'string',
        'reserveId' => 'string',
    ]);

    return array_merge($transformer->toDataProvider(), [
        ['cleaningRating', ['cleaningRating' => 6], 'max.numeric', ['max' => '5']],
        ['checkinRating', ['checkinRating' => 6], 'max.numeric', ['max' => '5']],
        ['checkoutRating', ['checkoutRating' => 6], 'max.numeric', ['max' => '5']],
        ['reservationRating', ['reservationRating' => 6], 'max.numeric', ['max' => '5']],
        ['maintenanceRating', ['maintenanceRating' => 6], 'max.numeric', ['max' => '5']],
        ['treatmentRating', ['treatmentRating' => 6], 'max.numeric', ['max' => '5']],
        ['rating', ['rating' => 6], 'max.numeric', ['max' => '5']],
    ]);
});

test('validate guest search method', function (
    string $invalidField,
    array $invalidData,
    string $errorKey,
    array $errorParams = [])
{
    $response = Stays::review()->guest()->search($invalidData);

    $this->assertRequestNotSent('GET', '/reviews/guest');
    $this->assertValidation($response, $invalidField, $errorKey, $errorParams);

})->with('guest search validation rules');

test('validate guest create method', function (
    string $invalidField,
    array $invalidData,
    string $errorKey,
    array $errorParams = [])
{
    $response = Stays::review()->guest()->create($invalidData);

    $this->assertRequestNotSent('POST', '/reviews/guest');
    $this->assertValidation($response, $invalidField, $errorKey, $errorParams);

})->with('guest create validation rules');

test('guest search method', function ()
{
    $response = Stays::review()->guest()->search([
        'from' => '2024-01-01',
        'to' => '2024-12-31',
    ]);

    $this->assertRequest('GET', '/reviews/guest', $response);
});

test('guest create method', function ()
{
    $response = Stays::review()->guest()->create([
        'day' => '2024-06-15',
        'cleaningRating' => 5,
        'checkinRating' => 4,
        'checkoutRating' => 5,
        'reservationRating' => 5,
        'maintenanceRating' => 4,
        'treatmentRating' => 5,
        'rating' => 5,
        'positiveTraits' => 'Great location',
        'negativeTraits' => 'Nothing',
        'reviewText' => 'Excellent stay!',
    ]);

    $this->assertRequest('POST', '/reviews/guest', $response);
});

test('guest get method', function ()
{
    $response = Stays::review()->guest()->get('reviewId');

    $this->assertRequest('GET', '/reviews/guest/reviewId', $response);
});

test('guest update method', function ()
{
    $response = Stays::review()->guest()->update('reviewId');

    $this->assertRequest('PATCH', '/reviews/guest/reviewId', $response);
});
