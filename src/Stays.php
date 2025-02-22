<?php

namespace Staysvel;

use Illuminate\Http\Client\Response;
use Staysvel\Lib\Booking;
use Staysvel\Lib\Calendar;
use Staysvel\Lib\Content;
use Staysvel\Lib\Doc;
use Staysvel\Lib\Finance;
use Staysvel\Lib\Price;
use Staysvel\Lib\Setting;
use Staysvel\Lib\Translation;

class Stays
{
    public static int $timeout = 60;

    public static function timeout(int $timeoutInSeconds = 60): static
    {
        self::$timeout = $timeoutInSeconds;

        return new static;
    }

    public static function bookRequest(array $parameters = []): Response
    {
        return (new Http())->timeout(self::$timeout)->post('/book-request', $parameters);
    }

    public static function docs(): Doc
    {
        return (new Doc())->timeout(self::$timeout);
    }

    public static function booking(): Booking
    {
        return (new Booking())->timeout(self::$timeout);
    }

    public static function finance(): Finance
    {
        return (new Finance())->timeout(self::$timeout);
    }

    public static function calendar(): Calendar
    {
        return (new Calendar())->timeout(self::$timeout);
    }

    public static function price(): Price
    {
        return (new Price())->timeout(self::$timeout);
    }

    public static function content(): Content
    {
        return (new Content())->timeout(self::$timeout);
    }

    public static function setting(): Setting
    {
        return (new Setting())->timeout(self::$timeout);
    }

    public static function translation(): Translation
    {
        return (new Translation())->timeout(self::$timeout);
    }
}
