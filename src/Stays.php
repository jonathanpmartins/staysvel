<?php

namespace Staysvel;

use Illuminate\Http\Client\Response;
use Staysvel\Lib\Booking;
use Staysvel\Lib\Calendar;
use Staysvel\Lib\Content;
use Staysvel\Lib\Doc;
use Staysvel\Lib\Finance;
use Staysvel\Lib\Price;
use Staysvel\Lib\Review;
use Staysvel\Lib\Setting;
use Staysvel\Lib\Translation;

class Stays
{
    public static int $timeout = 30;
    public static int $connectTimeout = 10;

    public static function timeout(int $timeoutInSeconds = 30): static
    {
        self::$timeout = $timeoutInSeconds;

        return new static;
    }

    public static function connectTimeout(int $connectTimeoutInSeconds = 10): static
    {
        self::$connectTimeout = $connectTimeoutInSeconds;

        return new static;
    }

    public static function bookRequest(array $parameters = []): Response
    {
        return (new Http())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout)->post('/book-request', $parameters);
    }

    public static function docs(): Doc
    {
        return (new Doc())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function booking(): Booking
    {
        return (new Booking())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function finance(): Finance
    {
        return (new Finance())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function calendar(): Calendar
    {
        return (new Calendar())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function price(): Price
    {
        return (new Price())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function content(): Content
    {
        return (new Content())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function setting(): Setting
    {
        return (new Setting())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function review(): Review
    {
        return (new Review())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }

    public static function translation(): Translation
    {
        return (new Translation())->timeout(self::$timeout)->connectTimeout(self::$connectTimeout);
    }
}
