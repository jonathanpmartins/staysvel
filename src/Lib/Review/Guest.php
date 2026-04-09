<?php

namespace Staysvel\Lib\Review;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Guest extends Api
{
    public function search(array $parameters = []): Response
    {
        $validated = $this->validate($parameters, [
            'from' => 'required|string|date_format:Y-m-d',
            'to' => 'required|string|date_format:Y-m-d',
            'limit' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer',
            'clientId' => 'nullable|string',
            'listingId' => 'nullable|string',
            'reserveId' => 'nullable|string',
        ]);

        if (is_a($validated, Response::class)) {
            return $validated;
        }

        return $this->http()->get('/reviews/guest', $validated);
    }

    public function create(array $parameters = []): Response
    {
        $validated = $this->validate($parameters, [
            'day' => 'required|string|date_format:Y-m-d',
            'cleaningRating' => 'required|numeric|min:1|max:5',
            'checkinRating' => 'required|numeric|min:1|max:5',
            'checkoutRating' => 'required|numeric|min:1|max:5',
            'reservationRating' => 'required|numeric|min:1|max:5',
            'maintenanceRating' => 'required|numeric|min:1|max:5',
            'treatmentRating' => 'required|numeric|min:1|max:5',
            'rating' => 'required|numeric|min:1|max:5',
            'positiveTraits' => 'required|string',
            'negativeTraits' => 'required|string',
            'reviewText' => 'required|string',
            'clientName' => 'nullable|string',
            'clientId' => 'nullable|string',
            'partnerId' => 'nullable|string',
            'listingId' => 'nullable|string',
            'reserveId' => 'nullable|string',
        ]);

        if (is_a($validated, Response::class)) {
            return $validated;
        }

        return $this->http()->post('/reviews/guest', $validated);
    }

    public function get(string $reviewId): Response
    {
        return $this->http()->get('/reviews/guest/'.$reviewId);
    }

    public function update(string $reviewId, array $parameters = []): Response
    {
        return $this->http()->patch('/reviews/guest/'.$reviewId, $parameters);
    }
}
