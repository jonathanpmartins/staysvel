<?php

namespace Tests;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Staysvel\StaysServiceProvider;

class TestCase extends BaseTestCase
{
    use WithWorkbench;

    public string $endpoint = 'https://api.stays.net';
    public string $testPath;
    public string $listingId;
    public string $roomId;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('services.stays.client_id', 'client-id');
        $this->app['config']->set('services.stays.client_secret', 'client-secret');
        $this->app['config']->set('services.stays.endpoint', $this->endpoint);

        Http::fake();

//        Http::fake(function (Request $request)
//        {
//            $data = $request->validate([
//                'somethind' => 'nullable',
//            ]);
//
//            dump($data);
//
//            return Http::response([]);
//        });
    }

    protected function getPackageProviders($app): array
    {
        return [StaysServiceProvider::class];
    }

    public function makePath(string $path): string
    {
        return StaysServiceProvider::$prefix.$path;
    }

    public function assertRequest(string $method, string $path, Response $response): void
    {
        Http::assertSent(function (Request $request) use ($method, $path)
        {
            return $request->method() == $method && str_contains($request->url(), $path);
        });

        $this->assertSame(
            $this->makePath($path),
            $response->effectiveUri()->getPath()
        );
    }

    public function assertRequestNotSent(string $method, string $path): void
    {
        Http::assertNotSent(function (Request $request) use ($method, $path)
        {
            return $request->method() == $method && str_contains($request->url(), $path);
        });
    }

    public function assertValidation(Response $response, string $invalidField, string $errorKey, array $errorParams = []): void
    {
        expect($response)->toBeInstanceOf(Response::class)
            ->and($response->status())->toBe(422);

        $data = $response->json();

        expect($data)->toBeArray()
            ->and($data)->toBeArray()
            ->and(isset($data['message']))->toBeTrue()
            ->and($data['message'])->toBeString()
            ->and(isset($data['errors']))->toBeTrue()
            ->and($data['errors'])->toBeArray()
            ->and($data['errors'])->not->toBeEmpty()
            ->and(isset($data['errors'][$invalidField]))->toBeTrue();

        $message = Lang::get(
            'validation.'.$errorKey,
            array_merge(
                [
                    'attribute' => str($invalidField)
                        ->snake()
                        ->replace('_', ' ')
                ],
                $errorParams,
            )
        );

        expect($data['errors'][$invalidField][0])
            ->toBe($message);
    }
}
