<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Booking\Blocking;
use Staysvel\Lib\Booking\Client;
use Staysvel\Lib\Booking\ListingPrice;
use Staysvel\Lib\Booking\PromoCode;
use Staysvel\Lib\Booking\Reservation;
use Staysvel\Lib\Booking\Search;

class Booking extends Api
{
    public function promoCodes(): PromoCode
    {
        return (new PromoCode())->timeout($this->timeout);
    }

    public function search(): Search
    {
        return (new Search())->timeout($this->timeout);
    }

    public function listingPrice(): ListingPrice
    {
        return (new ListingPrice())->timeout($this->timeout);
    }

    public function blocking(): Blocking
    {
        return (new Blocking())->timeout($this->timeout);
    }

    public function reservations(): Reservation
    {
        return (new Reservation())->timeout($this->timeout);
    }

    public function clients(): Client
    {
        return (new Client())->timeout($this->timeout);
    }
}
