<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Booking\Blocking;
use Stays\Api\Lib\Booking\Client;
use Stays\Api\Lib\Booking\ListingPrice;
use Stays\Api\Lib\Booking\PromoCode;
use Stays\Api\Lib\Booking\Reservation;
use Stays\Api\Lib\Booking\Search;

class Booking
{
    public function promoCodes(): PromoCode
    {
        return new PromoCode();
    }

    public function search(): Search
    {
        return new Search();
    }

    public function listingPrice(): ListingPrice
    {
        return new ListingPrice();
    }

    public function blocking(): Blocking
    {
        return new Blocking();
    }

    public function reservations(): Reservation
    {
        return new Reservation();
    }

    public function clients(): Client
    {
        return new Client();
    }
}
