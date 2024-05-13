<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Client extends Api
{
    public function search(array $parameters = []): Response
    {
        $validated = $this->validate($parameters, [
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'phone' => 'nullable|string',
            'hasReservations' => 'nullable|boolean',
            'reservationFilter' => 'nullable|string|in:creation',
            'reservationFrom' => 'nullable|string|date_format:Y-m-d',
            'reservationTo' => 'nullable|string|date_format:Y-m-d',
            'sortBy' => 'nullable|string',
            'sort' => 'nullable|string',
            'skip' => 'nullable|integer',
            'limit' => 'nullable|integer|max:20',
        ]);

        if (is_a($validated, Response::class))
        {
            return $validated;
        }

        return $this->http()->get('/booking/clients', $validated);
    }

    public function create($parameters = []): Response
    {
        return $this->http()->post('/booking/clients', $parameters);
    }

    public function get(string $clientId): Response
    {
        return $this->http()->get('/booking/clients/'.$clientId);
    }

    public function update(string $clientId, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/clients/'.$clientId, $parameters);
    }
}
