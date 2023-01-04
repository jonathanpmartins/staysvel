<?php

namespace Stays\Lib;

use Stays\Lib\Booking\Blocking;
use Stays\Lib\Booking\Client;
use Stays\Lib\Booking\ListingPrice;
use Stays\Lib\Booking\PromoCode;
use Stays\Lib\Booking\Reservation;
use Stays\Lib\Booking\Search;

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
