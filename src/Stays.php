<?php

namespace Staysvel;

use Staysvel\Lib\Booking;
use Staysvel\Lib\Calendar;
use Staysvel\Lib\Content;
use Staysvel\Lib\Finance;
use Staysvel\Lib\Price;
use Staysvel\Lib\Setting;
use Staysvel\Lib\Translation;
use Illuminate\Http\Client\Response;

class Stays
{
    public static function bookRequest(array $parameters = []): Response
    {
        return (new Http())->post('/book-request', $parameters);
    }

    public static function booking(): Booking
    {
        return new Booking();
    }

    public static function finance(): Finance
    {
        return new Finance();
    }

    public static function calendar(): Calendar
    {
        return new Calendar();
    }

    public static function price(): Price
    {
        return new Price();
    }

    public static function content(): Content
    {
        return new Content();
    }

    public static function setting(): Setting
    {
        return new Setting();
    }

    public static function translation(): Translation
    {
        return new Translation();
    }
}
