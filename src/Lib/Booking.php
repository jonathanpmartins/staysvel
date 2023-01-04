<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Booking\Blocking;
use Staysvel\Lib\Booking\Client;
use Staysvel\Lib\Booking\ListingPrice;
use Staysvel\Lib\Booking\PromoCode;
use Staysvel\Lib\Booking\Reservation;
use Staysvel\Lib\Booking\Search;

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
