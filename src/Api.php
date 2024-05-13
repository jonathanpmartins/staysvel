<?php

namespace Staysvel;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Illuminate\Http\Client\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class Api
{
    protected int $timeout = 60;

    public function timeout(int $timeoutInSeconds = 60): static
    {
        $this->timeout = $timeoutInSeconds;

        return $this;
    }

    protected function http(): Http
    {
        return (new Http())->timeout($this->timeout);
    }

    protected function validate(array $parameters, array $validation): Response|array
    {
        $validator = \Illuminate\Support\Facades\Validator::make($parameters, $validation);

        try {
            $data = $validator->validated();
        }
        catch (ValidationException $exception)
        {
            return $this->failedValidationResponse($exception, $validator);
        }

        return $data;
    }

    protected function failedValidationResponse(ValidationException $exception, Validator $validator): Response
    {
        return new Response(new GuzzleResponse(
            422,
            ['Content-Type' => 'application/json'],
            json_encode([
                'message' => $exception->getMessage(),
                'errors' => $validator->errors()->toArray(),
            ])
        ));
    }
}
