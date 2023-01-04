<?php

namespace Stays\Api;

use Stays\Api\Lib\Booking;
use Stays\Api\Lib\Calendar;
use Stays\Api\Lib\Content;
use Stays\Api\Lib\Finance;
use Stays\Api\Lib\Price;
use Stays\Api\Lib\Setting;
use Stays\Api\Lib\Translation;

class Stays
{
    public static function bookRequest(array $parameters = []): array
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
