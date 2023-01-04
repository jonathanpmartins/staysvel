<?php

namespace Stays;

use Stays\Lib\Booking;
use Stays\Lib\Calendar;
use Stays\Lib\Content;
use Stays\Lib\Finance;
use Stays\Lib\Price;
use Stays\Lib\Setting;
use Stays\Lib\Translation;

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
