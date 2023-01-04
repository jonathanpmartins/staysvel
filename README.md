# Stays API integration with Laravel

---
- [Booking Checkout API](#booking-checkout-api)
  - [Initiate checkout process](#initiate-checkout-process)
- [Promo code API](#promo-code-api)
  - [Create promo code](#create-promo-code)
  - [Get promo code](#get-promo-code)
  - [Modify promo code](#modify-promo-code)
  - [Delete promo code](#delete-promo-code)
  - [Search promo codes](#search-promo-codes)
- [Booking API](#booking-api)
  - [Retrieve Search filter](#retrieve-search-filter)
  - [Search listings](#search-listings)
  - [Calculate listing price](#calculate-listing-price)
  - [Create blocking](#create-blocking)
  - [Modify blocking](#modify-blocking)
  - [Delete blocking](#delete-blocking)
  - [Create reservation](#create-reservation)
  - [Retrieve reservation](#retrieve-reservation)
  - [Modify reservation](#modify-reservation)
  - [Cancel reservation](#cancel-reservation)
  - [Delete reservation](#delete-reservation)
  - [Search active reservations](#search-active-reservations)
  - [Reservations report XLSX](#reservations-report-xlsx)
  - [Reservations report JSON](#reservations-report-json)
  - [Clients](#clients)
- [Finance API](#finance-api)
  - [Create Payment Provider](#create-payment-provider)
  - [Retrieve Payment Provider](#retrieve-payment-provider)
  - [Modify Payment Provider](#modify-payment-provider)
  - [Retrieve Payment Providers](#retrieve-payment-providers)
- [Listing Calendar API](#listing-calendar-api)
  - [Retrieve Listing Calendar](#retrieve-listing-calendar)
  - [Update Listing Calendar](#update-listing-calendar)
- [Prices API](#prices-api)
  - [Retrieve Price Regions](#retrieve-price-regions)
  - [Create Price Region](#create-price-region)
  - [Modify Price Region](#modify-price-region)
  - [Delete Price Region](#delete-price-region)
  - [Retrieve Sell Price Rules](#retrieve-sell-price-rules)
  - [Create Sell Price Rule](#create-sell-price-rule)
  - [Retrieve Sell Price Rule](#retrieve-sell-price-rule)
  - [Modify Sell Price Rule](#modify-sell-price-rule)
  - [Delete Sell Price Rule](#delete-sell-price-rule)
  - [Retrieve Listing Sell Prices](#retrieve-listing-sell-prices)
  - [Retrieve Listing Sell Price](#retrieve-listing-sell-price)
  - [Modify Listing Sell Price](#modify-listing-sell-price)
- [Content API](#content-api)
  - [Create Property](#create-property)
  - [Retrieve Property](#retrieve-property)
  - [Modify Property](#modify-property)
  - [Retrieve Properties](#retrieve-properties)
 

---



## Booking Checkout API

### Initiate checkout process
```php 
Stays::bookRequest(array $parameters);
```
| Parameter    | Type                             | Description                                                                           |
|--------------|----------------------------------|---------------------------------------------------------------------------------------|
| from         | ISO date string ```YYYY-MM-DD``` | booking start date                                                                    |
| to           | ISO date string ```YYYY-MM-DD``` | booking end date                                                                      |
| aptid        | String                           | Stays apartment identifier                                                            |
| persons      | Integer                          | total guests number (Optional. Default is 1)                                          |
| client       | Object                           | client who makes booking                                                              |
| client.email | String                           | email address of client (will use to search if client already exists in Stays system) |
| client.fName | String                           | client first name                                                                     |
| cient.lName  | String                           | client last name                                                                      |



## Promo code API

### Create promo code
```php
Stays::booking()->promoCodes()->create(array $parameters);
```
| Parameter                                       | Type                             | Description                                                                                             |
|-------------------------------------------------|----------------------------------|---------------------------------------------------------------------------------------------------------|
| name *                                          | String                           | Promo code name                                                                                         |
| type *                                          | String                           | Promo code discount type. Can be 'fixed' or 'percent'                                                   |
| _f_discount                                     | Number                           | Promo code percentage discount                                                                          |
| _mcdiscount                                     | Object                           | Promo code fixed discount with mutlicurrency                                                            |
| status                                          | String                           | Promo code status. Can be 'active' or 'inactive'                                                        |
| maxUsesCount                                    | Integer                          | Define, how many times promo code can be used                                                           |
| useWithOtherPromotions                          | Boolean                          | Can promocode be applied if other promotions exists                                                     |
| periodRestrictions                              | Object                           | Defines general restrictions for date range of using                                                    |
| periodRestrictions.enable                       | Boolean                          | Indicates if restrictions are active                                                                    |
| periodRestrictions.from                         | ISO date string ```YYYY-MM-DD``` | Start date when promocode can be applied                                                                |
| periodRestrictions.to                           | ISO date string ```YYYY-MM-DD``` | End date when promocode can be applied                                                                  |
| periodRestrictions.invalidDaysOfWeek            | Array                            | Days of week, when promocode cannot be applied. Possible values are 1-7. Where 1 is Monday, 7 is Sunday |
| calendarRestrictions                            | Object                           | Defines calendar restrictions                                                                           |
| calendarRestrictions.enable                     | Boolean                          | Indicates if restrictions are active                                                                    |
| calendarRestrictions.validArrivalDates          | Object                           | Defines date range for arrival, when promocode can be applied                                           |
| calendarRestrictions.validArrivalDates.from     | ISO date string ```YYYY-MM-DD``` | Start arrival date when promocode can be applied                                                        |
| calendarRestrictions.validArrivalDates.to       | ISO date string ```YYYY-MM-DD``` | End arrival date when promocode can be applied                                                          |
| calendarRestrictions.invalidArrivalDates        | Object                           | Defines date range for arrival, when promocode cannot be applied                                        |
| calendarRestrictions.invalidArrivalDates.from   | ISO date string ```YYYY-MM-DD``` | Start arrival date when promocode cannot be applied                                                     |
| calendarRestrictions.invalidArrivalDates.to     | ISO date string ```YYYY-MM-DD``` | End arrival date when promocode cannot be applied                                                       |
| calendarRestrictions.validDepartureDates        | Object                           | Defines date range for departuren, when promocode can be applied                                        |
| calendarRestrictions.validDepartureDates.from   | ISO date string ```YYYY-MM-DD``` | Start departure date when promocode can be applied                                                      |
| calendarRestrictions.validDepartureDates.to     | ISO date string ```YYYY-MM-DD``` | End departure date when promocode can be applied                                                        |
| calendarRestrictions.invalidDepartureDates      | Object                           | Defines date range for departure, when promocode cannot be applied                                      |
| calendarRestrictions.invalidDepartureDates.from | ISO date string ```YYYY-MM-DD``` | Start departure date when promocode cannot be applied                                                   |
| calendarRestrictions.invalidDepartureDates.to   | ISO date string ```YYYY-MM-DD``` | End departure date when promocode cannot be applied                                                     |
| calendarRestrictions.minLengthOfStay            | Integer                          | Indicates minimum nights number of booking when promocode can be applied                                |
| productRestrictions                             | Object                           | Defines product restrictions using bedrooms or groups                                                   |
| productRestrictions.enable                      | Boolean                          | Indicates if restrictions are active                                                                    |
| productRestrictions.bedgrooms                   | Array                            | Defines bedrooms numbers for what promo code is applicable. For Studio is 0                             |
| productRestrictions.groups                      | Array                            | Defines groups identifiers for what promo code is applicable.                                           |
| userRestrictions                                | Object                           | Defines user restrictions                                                                               |
| userRestrictions.enable                         | Boolean                          | Indicates if restrictions are active                                                                    |
| userRestrictions.emails                         | Array                            | Defines list of guests emails for what promo code is applicable.                                        |
| userRestrictions.clients                        | Array                            | Defines list of clients identifiers for what promo code is applicable.                                  |
| userRestrictions.minReservationsCount           | Integer                          | Defines min number of previous guest's reservations after promo code will be valid                      |
| userRestrictions.minAmountSpentByGuest          | Number                           | Defines min amount of money that guest spent before to make promo code valid                            |
| userRestrictions.maxGuestsCount                 | Integer                          | Defines max guests count for reservations                                                               |

### Get promo code
```php
Stays::booking()->promoCodes()->get(string $id);
```

### Modify promo code
```php
Stays::booking()->promoCodes()->update(string $id, array $parameters);
```
| Parameter                                       | Type                             | Description                                                                                             |
|-------------------------------------------------|----------------------------------|---------------------------------------------------------------------------------------------------------|
| name *                                          | String                           | Promo code name                                                                                         |
| type *                                          | String                           | Promo code discount type. Can be 'fixed' or 'percent'                                                   |
| _f_discount                                     | Number                           | Promo code percentage discount                                                                          |
| _mcdiscount                                     | Object                           | Promo code fixed discount with mutlicurrency                                                            |
| status                                          | String                           | Promo code status. Can be 'active' or 'inactive'                                                        |
| maxUsesCount                                    | Integer                          | Define, how many times promo code can be used                                                           |
| useWithOtherPromotions                          | Boolean                          | Can promocode be applied if other promotions exists                                                     |
| periodRestrictions                              | Object                           | Defines general restrictions for date range of using                                                    |
| periodRestrictions.enable                       | Boolean                          | Indicates if restrictions are active                                                                    |
| periodRestrictions.from                         | ISO date string ```YYYY-MM-DD``` | Start date when promocode can be applied                                                                |
| periodRestrictions.to                           | ISO date string ```YYYY-MM-DD``` | End date when promocode can be applied                                                                  |
| periodRestrictions.invalidDaysOfWeek            | Array                            | Days of week, when promocode cannot be applied. Possible values are 1-7. Where 1 is Monday, 7 is Sunday |
| calendarRestrictions                            | Object                           | Defines calendar restrictions                                                                           |
| calendarRestrictions.enable                     | Boolean                          | Indicates if restrictions are active                                                                    |
| calendarRestrictions.validArrivalDates          | Object                           | Defines date range for arrival, when promocode can be applied                                           |
| calendarRestrictions.validArrivalDates.from     | ISO date string ```YYYY-MM-DD``` | Start arrival date when promocode can be applied                                                        |
| calendarRestrictions.validArrivalDates.to       | ISO date string ```YYYY-MM-DD``` | End arrival date when promocode can be applied                                                          |
| calendarRestrictions.invalidArrivalDates        | Object                           | Defines date range for arrival, when promocode cannot be applied                                        |
| calendarRestrictions.invalidArrivalDates.from   | ISO date string ```YYYY-MM-DD``` | Start arrival date when promocode cannot be applied                                                     |
| calendarRestrictions.invalidArrivalDates.to     | ISO date string ```YYYY-MM-DD``` | End arrival date when promocode cannot be applied                                                       |
| calendarRestrictions.validDepartureDates        | Object                           | Defines date range for departuren, when promocode can be applied                                        |
| calendarRestrictions.validDepartureDates.from   | ISO date string ```YYYY-MM-DD``` | Start departure date when promocode can be applied                                                      |
| calendarRestrictions.validDepartureDates.to     | ISO date string ```YYYY-MM-DD``` | End departure date when promocode can be applied                                                        |
| calendarRestrictions.invalidDepartureDates      | Object                           | Defines date range for departure, when promocode cannot be applied                                      |
| calendarRestrictions.invalidDepartureDates.from | ISO date string ```YYYY-MM-DD``` | Start departure date when promocode cannot be applied                                                   |
| calendarRestrictions.invalidDepartureDates.to   | ISO date string ```YYYY-MM-DD``` | End departure date when promocode cannot be applied                                                     |
| calendarRestrictions.minLengthOfStay            | Integer                          | Indicates minimum nights number of booking when promocode can be applied                                |
| productRestrictions                             | Object                           | Defines product restrictions using bedrooms or groups                                                   |
| productRestrictions.enable                      | Boolean                          | Indicates if restrictions are active                                                                    |
| productRestrictions.bedgrooms                   | Array                            | Defines bedrooms numbers for what promo code is applicable. For Studio is 0                             |
| productRestrictions.groups                      | Array                            | Defines groups identifiers for what promo code is applicable.                                           |
| userRestrictions                                | Object                           | Defines user restrictions                                                                               |
| userRestrictions.enable                         | Boolean                          | Indicates if restrictions are active                                                                    |
| userRestrictions.emails                         | Array                            | Defines list of guests emails for what promo code is applicable.                                        |
| userRestrictions.clients                        | Array                            | Defines list of clients identifiers for what promo code is applicable.                                  |
| userRestrictions.minReservationsCount           | Integer                          | Defines min number of previous guest's reservations after promo code will be valid                      |
| userRestrictions.minAmountSpentByGuest          | Number                           | Defines min amount of money that guest spent before to make promo code valid                            |
| userRestrictions.maxGuestsCount                 | Integer                          | Defines max guests count for reservations                                                               |

### Delete promo code
```php
Stays::booking()->promoCodes()->delete(string $id);
```

### Search promo codes
```php
Stays::booking()->promoCodes()->search(array $parameters);
```
| Parameter | Type    | Description                                                                    |
|-----------|---------|--------------------------------------------------------------------------------|
| name      | String  | Promo code name. If it has special symbols, please use encodeURIComponent      |
| status    | String  | Promo code status. Possible values are 'active' or 'inactive'                  |
| used      | Boolean | Search by promo codes that were already used or not                            |
| skip      | Integer | Number of records to skip. Used to build proper pagination. Default value is 0 |
| limit     | Integer | Maximum number of records to return. Default and maximum value is 20           |



## Booking API

### Retrieve Search filter
```php
Stays::booking()->search()->filter();
```

### Search listings
```php
Stays::booking()->search()->listings(array $parameters);
```
| Parameter  | Type                             | Description                                                                     |
|------------|----------------------------------|---------------------------------------------------------------------------------|
| from       | ISO date string ```YYYY-MM-DD``` | Booking start date                                                              |
| to         | ISO date string ```YYYY-MM-DD``` | Booking end date                                                                |
| guests     | Integer                          | Number of guests                                                                |
| rooms      | Array [integer]                  | Number of rooms. 0 - Studio, 1 - one room, 2 - two rooms.                       |
| cities     | Array [string]                   | Array of cities names                                                           |
| regions    | Array [string]                   | Array of regions names                                                          |
| states     | Array [string]                   | Array of state names                                                            |
| countries  | Array [string]                   | Array of country codes                                                          |
| properties | Array [string]                   | Array of properties identifiers                                                 |
| amenities  | Array [string]                   | Listing or property amenities as an array of amenity IDs.                       |
| inventory  | Array [string]                   | Rooms inventory as an array of inventory names.                                 |
| listingId  | String                           | Listing identifier (short and long both values accepted)                        |
| sort       | String                           | Allows to sort result by provided criteria. Possble values are rating           |
| skip       | Integer                          | Number of records to skip. Used to build proper pagination. Default value is 0  |
| limit      | Integer                          | Maximum number of records to return. Default and maximum value is 20            |

### Calculate listing price
```php
Stays::booking()->listingPrice()->calculate(array $parameters);
```
| Parameter  | Type                             | Description                                                                               |
|------------|----------------------------------|-------------------------------------------------------------------------------------------|
| listingIds | Array                            | Listings identifiers. Both identifiers (long and short) are supported                     |
| from       | ISO date string ```YYYY-MM-DD``` | Booking start date                                                                        |
| to         | ISO date string ```YYYY-MM-DD``` | Booking end date                                                                          |
| guests     | Integer                          | Number of guests                                                                          |
| promocode  | String                           | Promo code name or identifier. If name has special symbols, please use encodeURIComponent |

### Create blocking
```php
Stays::booking()->blocking()->create(array $parameters);
```
| Parameter          | Type                             | Description                                                    |
|--------------------|----------------------------------|----------------------------------------------------------------|
| type *             | String                           | Blocking type. Possible values are "blocked" or "maintenance"  |
| listingId *        | String                           | Listing identifier (short and long both values accepted)       |
| checkInDate *      | ISO date string ```YYYY-MM-DD``` | Start date                                                     |
| checkInTime        | String HH:mm                     | Start time. If ommited, default check-in time will be applied  |
| checkOutDate *     | ISO date string ```YYYY-MM-DD``` | End date                                                       |
| checkOutTime       | String HH:mm                     | End time. If ommited, default check-out time will be applied   |
| internalNote       | String                           | Some description text                                          |
| cleaningTaskBefore | Boolean                          | Indicates, if system should creates cleaning task before start |
| cleaningTaskAfter  | Boolean                          | Indicates, if system should creates cleaning task after end    |

### Modify blocking
```php
Stays::booking()->blocking()->update(array $parameters);
```
| Parameter          | Type                             | Description                                                    |
|--------------------|----------------------------------|----------------------------------------------------------------|
| type *             | String                           | Blocking type. Possible values are "blocked" or "maintenance"  |
| checkInDate        | ISO date string ```YYYY-MM-DD``` | Start date                                                     |
| checkInTime        | String HH:mm                     | Start time. If ommited, default check-in time will be applied  |
| checkOutDate       | ISO date string ```YYYY-MM-DD``` | End date                                                       |
| checkOutTime       | String HH:mm                     | End time. If ommited, default check-out time will be applied   |
| internalNote       | String                           | Some description text                                          |
| cleaningTaskBefore | Boolean                          | Indicates, if system should creates cleaning task before start |
| cleaningTaskAfter  | Boolean                          | Indicates, if system should creates cleaning task after end    |

### Delete blocking
```php
Stays::booking()->blocking()->delete(string $id);
```

### Create reservation
```php
Stays::booking()->reservations()->create(array $parameters);
```
| Parameter              | Type                             | Description                                                                               |
|------------------------|----------------------------------|-------------------------------------------------------------------------------------------|
| type *                 | String                           | Reservation type. For creation, applicable only "reserved" or "booked"                    |
| listingId *            | String                           | Reservation identifier (short and long both values accepted)                              |
| checkInDate *          | ISO date string ```YYYY-MM-DD``` | Arrival date                                                                              |
| checkInTime            | String HH:mm                     | Arrival time. If ommited, default check-in time will be applied                           |
| checkOutDate *         | ISO date string ```YYYY-MM-DD``` | Departure date                                                                            |
| checkOutTime           | String HH:mm                     | Departuren time. If ommited, default check-out time will be applied                       |
| _idclient *            | String                           | Client identifier                                                                         |
| guests *               | Integer                          | Guests count                                                                              |
| guestsDetails          | Object                           | Additional details object                                                                 |
| guestsDetails.adults   | Integer                          | Adults count                                                                              |
| guestsDetails.children | Integer                          | Children count                                                                            |
| promocode              | String                           | Promo code name or identifier. If name has special symbols, please use encodeURIComponent |
| price                  | Object                           | Send this object if you want to overwrite default price                                   |
| price.currency         | String                           | ISO currency                                                                              |
| price._f_expected      | Number                           | Expected price value                                                                      |
| partnerCode            | String                           | Partner uniq identifier of reservation                                                    |

### Retrieve reservation
```php
Stays::booking()->reservations()->get(string $id);
```

### Modify reservation
```php
Stays::booking()->reservations()->update(string $id, array $parameters);
```
| Parameter              | Type                             | Description                                                                                                                              |
|------------------------|----------------------------------|------------------------------------------------------------------------------------------------------------------------------------------|
| type *                 | String                           | Reservation type. For creation, applicable only "reserved" or "booked"                                                                   |
| listingId              | String                           | Reservation identifier (short and long both values accepted)                                                                             |
| checkInDate            | ISO date string ```YYYY-MM-DD``` | Arrival date                                                                                                                             |
| checkInTime            | String HH:mm                     | Arrival time. If ommited, default check-in time will be applied                                                                          |
| checkOutDate           | ISO date string ```YYYY-MM-DD``` | Departure date                                                                                                                           |
| checkOutTime           | String HH:mm                     | Departuren time. If ommited, default check-out time will be applied                                                                      |
| _idclient              | String                           | Client identifier                                                                                                                        |
| guests                 | Integer                          | Guests count                                                                                                                             |
| guestsDetails          | Object                           | Additional details object                                                                                                                |
| guestsDetails.adults   | Integer                          | Adults count                                                                                                                             |
| guestsDetails.children | Integer                          | Children count                                                                                                                           |
| promocode              | String                           | Promo code name or identifier. If name has special symbols, please use encodeURIComponent. For unset previous promocode use 'null' value |
| price                  | Object                           | Send this object if you want to overwrite default price                                                                                  |
| price.currency         | String                           | ISO currency                                                                                                                             |
| price._f_expected      | Number                           | Expected price value                                                                                                                     |

### Cancel reservation
```php
Stays::booking()->reservations()->cancel(string $id, array $parameters);
```
| Parameter     | Type   | Description                                                    |
|---------------|--------|----------------------------------------------------------------|
| type *        | String | Reservation type. For cancellation, applicable only "canceled" |
| cancelMessage | String | Cancellation description                                       |

### Delete reservation
```php
Stays::booking()->reservations()->delete(string $id);
```

### Search active reservations
```php
Stays::booking()->reservations()->search(array $parameters);
```
| Parameter | Type                             | Description                                                                                                                                                                                                                                         |
|-----------|----------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| from      | ISO date string ```YYYY-MM-DD``` | Start date range                                                                                                                                                                                                                                    |
| to        | ISO date string ```YYYY-MM-DD``` | End date range                                                                                                                                                                                                                                      |
| dateType  | String                           | Criteria for applying dates range. Possible values are "arrival", "departure", "creation", "creationorig", "included"                                                                                                                               |
| listingId | String or [ String ]             | Listing identifier. For multiple listings use listingId=WV01B&listingId=YR09A                                                                                                                                                                       |
| type      | String or [ String ]             | Reservation types. Default types are "reserved","booked", "contract". If you want to search by multple types, use type=reserved&type=booked&type=blocked Possible values are "reserved", "booked", "contract", "blocked", "maintenance", "canceled" |
| _idclient | String                           | Client identifier                                                                                                                                                                                                                                   |
| skip      | Integer                          | Number of records to skip. Used to build proper pagination. Default value is 0                                                                                                                                                                      |
| limit     | Integer                          | Maximum number of records to return. Default and maximum value is 20                                                                                                                                                                                |

### Reservations report XLSX
```php
Stays::booking()->reservations()->export()->xlsx(array $parameters);
```
| Parameter | Type                             | Description                                                                                                           |
|-----------|----------------------------------|-----------------------------------------------------------------------------------------------------------------------|
| from      | ISO date string ```YYYY-MM-DD``` | Start date range                                                                                                      |
| to        | ISO date string ```YYYY-MM-DD``` | End date range                                                                                                        |
| dateType  | String                           | Criteria for applying dates range. Possible values are "arrival", "departure", "creation", "creationorig", "included" |
| listingId | String                           | Listing identifier                                                                                                    |
| type      | String                           | Reservation types. Default types are "reserved","booked", "contract".                                                 |
| _idclient | String                           | Client identifier                                                                                                     |

### Reservations report JSON
```php
Stays::booking()->reservations()->export()->json(array $parameters);
```
| Parameter | Type                             | Description                                                                                                           |
|-----------|----------------------------------|-----------------------------------------------------------------------------------------------------------------------|
| from      | ISO date string ```YYYY-MM-DD``` | Start date range                                                                                                      |
| to        | ISO date string ```YYYY-MM-DD``` | End date range                                                                                                        |
| dateType  | String                           | Criteria for applying dates range. Possible values are "arrival", "departure", "creation", "creationorig", "included" |
| listingId | String                           | Listing identifier                                                                                                    |
| type      | String                           | Reservation types. Default types are "reserved","booked", "contract".                                                 |
| _idclient | String                           | Client identifier                                                                                                     |

### Clients
```php
Stays::booking()->clients()->search(array $parameters);
```
| Parameter         | Type                             | Description                                                                                   |
|-------------------|----------------------------------|-----------------------------------------------------------------------------------------------|
| name              | String                           | Partial or full client's name                                                                 |
| email             | String                           | Partial or full client's email                                                                |
| phone             | String                           | Partial or full client's phone                                                                |
| hasReservations   | Boolean                          | Allows to search only for clients with/without reservations                                   |
| reservationFilter | String                           | Set criteria to search clients by reservations for certain period. Possible values - creation |
| reservationFrom   | ISO date string ```YYYY-MM-DD``` | Set start period for searching reservations                                                   |
| reservationTo     | ISO date string ```YYYY-MM-DD``` | Set end period for searching reservations                                                     |
| sortBy            | String                           | Setup field for sorting. Accepts name                                                         |
| sort              | String                           | Setup sorting direction. Accepts asc                                                          |
| skip              | Integer                          | Number of records to skip. Used to build proper pagination. Default value is 0                |
| limit             | Integer                          | Maximum number of records to return. Default and maximum value is 20                          |

### Client
```php
Stays::booking()->clients()->get(string $id);
```



## Finance API

### Create Payment Provider
```php
Stays::finance()->paymentProviders()->create(array $parameters);
```
| Parameter       | Type    | Description                                                                      |
|-----------------|---------|----------------------------------------------------------------------------------|
| type *          | String  | Payment provider type. Must be "bank"                                            |
| status          | String  | Payment provider status. Can be 'active' or 'inactive'                           |
| _mcstartBalance | Object  | Set the accounting starting balance (mutlicurrency)                              |
| internalName    | String  | Payment provider internal name                                                   |
| _mstitle        | Object  | Multilanguage commercial name                                                    |
| _msdesc         | Object  | Multilanguage commercial description                                             |
| allowPayments   | Boolean | Indicates if bank will be used for frontend allowPayments                        |
| currencies      | Array   | List of accepted currencies for frontend allowPayments                           |
| _msconfirmText  | Object  | Multilanguage confirmation text. Will be shown after frontend payment completion |
| bankDetails     | String  | Extra info that client needs to complete payment                                 |

### Retrieve Payment Provider
```php
Stays::finance()->paymentProviders()->get(string $id);
```

### Modify Payment Provider
```php
Stays::finance()->paymentProviders()->update(string $id, array $parameters);
```
| Parameter | Type   | Description                                                                                   |
|-----------|--------|-----------------------------------------------------------------------------------------------|
| type *    | String | Payment provider type. Can be 'bank' or 'user'. Important: it is not possible to change type. |

### Retrieve Payment Providers
```php
Stays::finance()->paymentProviders()->search(array $parameters);
```
| Parameter | Type   | Description                                            |
|-----------|--------|--------------------------------------------------------|
| status    | String | Payment provider status. Can be 'active' or 'inactive' |



## Listing Calendar API

### Retrieve Listing Calendar
```php
Stays::calendar()->listings()->get(string $id, array $parameters);
```
| Parameter             | Type                             | Description                                                                                   |
|-----------------------|----------------------------------|-----------------------------------------------------------------------------------------------|
| from                  | ISO date string ```YYYY-MM-DD``` | Start date of returning data. Required                                                        |
| to                    | ISO date string ```YYYY-MM-DD``` | End date of returning data. Required                                                          |
| ignorePriceGroupUnits | Boolean                          | Ignore availability for price group units. Only master listing availability will be returned. |
| ignoreCloneGroupUnits | Boolean                          | Ignore availability for clone group units. Only master listing availability will be returned  |

### Update Listing Calendar
```php
Stays::calendar()->listings()->update(string $id, array $parameters);
```
| Parameter         | Type                             | Description                             |
|-------------------|----------------------------------|-----------------------------------------|
| from              | ISO date string ```YYYY-MM-DD``` | Start date                              |
| to                | ISO date string ```YYYY-MM-DD``` | End date                                |
| prices            | Array                            | Prices array                            |
| prices.minStay    | Integer                          | Minimum stay restriction to apply price |
| prices._f_val     | Number                           | Price value in listing currency         |
| closedToArrival   | Boolean                          | Arrival restriction                     |
| closedToDeparture | Boolean                          | Departure restriction                   |



## Prices API

### Retrieve Price Regions
```php
Stays::price()->regions()->search();
```

### Create Price Region
```php
Stays::price()->regions()->create(array $parameters);
```
| Parameter | Type   | Description              |
|-----------|--------|--------------------------|
| name *    | String | Price region unique name |

### Modify Price Region
```php
Stays::price()->regions()->update(string $id, array $parameters);
```
| Parameter | Type   | Description              |
|-----------|--------|--------------------------|
| name *    | String | Price region unique name |

### Delete Price Region
```php
Stays::price()->regions()->delete(string $id);
```

### Retrieve Sell Price Rules
```php
Stays::price()->rules()->search(array $parameters);
```
| Parameter | Type                             | Description                                                     |
|-----------|----------------------------------|-----------------------------------------------------------------|
| _idregion | String                           | Price region. For default region omit it.                       |
| from      | ISO date string ```YYYY-MM-DD``` | start date for search                                           |
| to        | ISO date string ```YYYY-MM-DD``` | end date for search                                             |
| status    | String                           | Status of Sell Price Rule. Accepts values ['active','inactive'] |

### Create Sell Price Rule
```php
Stays::price()->rules()->create(array $parameters);
```
| Parameter            | Type                             | Description                                                                                          |
|----------------------|----------------------------------|------------------------------------------------------------------------------------------------------|
| _idregion            | String                           | Price region. For default region omit it.                                                            |
| type *               | String                           | Type of Sell Price Rule. Accepts ['season','event'].                                                 |
| name *               | String                           | Internal name of Sell Price Rule.                                                                    |
| hint                 | String                           | Hint text.                                                                                           |
| from                 | ISO date string ```YYYY-MM-DD``` | start date of Sell Price Rule                                                                        |
| to                   | ISO date string ```YYYY-MM-DD``` | end date of Sell Price Rule                                                                          |
| status               | String                           | Status of Sell Price Rule. Accepts values ['active','inactive']                                      |
| ratePlans            | Array                            | List of rate plans                                                                                   |
| ratePlans.minStay    | Integer                          | Defines minimal number of nights                                                                     |
| ratePlans._i_percent | Integer                          | Defines percentage discount for target number of nights. For first rate plan percentage must be 0    |
| useMonthlyRate       | Boolean                          | Indicates, should system use special monthly price for long stay. Applicable only for type 'season'. |

### Retrieve Sell Price Rule
```php
Stays::price()->rules()->get(string $id);
```

### Modify Sell Price Rule
```php
Stays::price()->rules()->update(string $id, array $parameters);
```
| Parameter            | Type                             | Description                                                                                          |
|----------------------|----------------------------------|------------------------------------------------------------------------------------------------------|
| _idregion            | String                           | Price region. For default region omit it.                                                            |
| type *               | String                           | Type of Sell Price Rule. Accepts ['season','event'].                                                 |
| name *               | String                           | Internal name of Sell Price Rule.                                                                    |
| hint                 | String                           | Hint text.                                                                                           |
| from                 | ISO date string ```YYYY-MM-DD``` | start date of Sell Price Rule                                                                        |
| to                   | ISO date string ```YYYY-MM-DD``` | end date of Sell Price Rule                                                                          |
| status               | String                           | Status of Sell Price Rule. Accepts values ['active','inactive']                                      |
| ratePlans            | Array                            | List of rate plans                                                                                   |
| ratePlans.minStay    | Integer                          | Defines minimal number of nights                                                                     |
| ratePlans._i_percent | Integer                          | Defines percentage discount for target number of nights. For first rate plan percentage must be 0    |
| useMonthlyRate       | Boolean                          | Indicates, should system use special monthly price for long stay. Applicable only for type 'season'. |

### Delete Sell Price Rule
```php
Stays::price()->rules()->delete(string $id);
```

### Retrieve Listing Sell Prices
```php
Stays::price()->sells()->search(array $parameters);
```
| Parameter   | Type                             | Description                                              |
|-------------|----------------------------------|----------------------------------------------------------|
| listingId * | String                           | Listing identifier (short and long both values accepted) |
| from *      | ISO date string ```YYYY-MM-DD``` | start date for search                                    |
| to *        | ISO date string ```YYYY-MM-DD``` | end date for search                                      |

### Retrieve Listing Sell Price
```php
Stays::price()->sells()->get(string $listingId);
```

### Modify Listing Sell Price
```php
Stays::price()->sells()->update(string $seasonId, array $parameters);
```
| Parameter          | Type   | Description                                                                     |
|--------------------|--------|---------------------------------------------------------------------------------|
| type *             | String | Type of listing sell price. Accepts ['global']                                  |
| baseRateValue *    | Double | Price value for minimal night rate plan                                         |
| monthlyRateValue * | Double | Price value for monthly rate. Applicable only if season has useMonthlyRate flag |

| Parameter            | Type    | Description                                                                                       |
|----------------------|---------|---------------------------------------------------------------------------------------------------|
| type *               | String  | Type of listing sell price. Accepts ['individual']                                                |
| baseRateValue *      | Double  | Price value for minimal night rate plan                                                           |
| ratePlans            | Array   | List of rate plans                                                                                |
| ratePlans.minStay    | Integer | Defines minimal number of nights                                                                  |
| ratePlans._i_percent | Integer | Defines percentage discount for target number of nights. For first rate plan percentage must be 0 |
| monthlyRateValue *   | Double  | Price value for monthly rate. Applicable only if season has useMonthlyRate flag                   |



## Content API

### Create Property
```php
Stays::content()->properties()->create(array $parameters);
```
| Parameter            | Type    | Description                                                              |
|----------------------|---------|--------------------------------------------------------------------------|
| internalName *       | String  | Property unique internal name                                            |
| _idtype *            | String  | Property type identifier. List of available types is here                |
| _mstitle             | Object  | Multilanguage commercial name                                            |
| _msdesc              | Object  | Multilanguage commercial description                                     |
| status               | String  | Status of property. Accepts values ['active','inactive','draft']         |
| address              | Object  | Address of property.                                                     |
| address.countryCode  | String  | ISO country countryCode                                                  |
| address.state        | String  | State                                                                    |
| address.stateCode    | String  | State code                                                               |
| address.city         | String  | City                                                                     |
| address.region       | String  | Region of city                                                           |
| address.street       | String  | Street                                                                   |
| address.streetNumber | Integer | Number of street                                                         |
| addreess.zip         | String  | Zip code                                                                 |
| latLng               | Object  | Geo coordinates                                                          |
| latLng._f_lat        | Float   | Latitude                                                                 |
| latLng._f_lng        | Float   | Longitude                                                                |
| amenities            | Array   | Property amenities identifiers list. List of available amenities is here |

### Retrieve Property
```php
Stays::content()->properties()->get(string $propertyId);
```

### Modify Property
```php
Stays::content()->properties()->update(string $propertyId, array $parameters);
```
| Parameter            | Type    | Description                                                              |
|----------------------|---------|--------------------------------------------------------------------------|
| internalName *       | String  | Property unique internal name                                            |
| _idtype *            | String  | Property type identifier. List of available types is here                |
| _mstitle             | Object  | Multilanguage commercial name                                            |
| _msdesc              | Object  | Multilanguage commercial description                                     |
| status               | String  | Status of property. Accepts values ['active','inactive','draft']         |
| address              | Object  | Address of property.                                                     |
| address.countryCode  | String  | ISO country countryCode                                                  |
| address.state        | String  | State                                                                    |
| address.stateCode    | String  | State code                                                               |
| address.city         | String  | City                                                                     |
| address.region       | String  | Region of city                                                           |
| address.street       | String  | Street                                                                   |
| address.streetNumber | Integer | Number of street                                                         |
| addreess.zip         | String  | Zip code                                                                 |
| latLng               | Object  | Geo coordinates                                                          |
| latLng._f_lat        | Float   | Latitude                                                                 |
| latLng._f_lng        | Float   | Longitude                                                                |
| amenities            | Array   | Property amenities identifiers list. List of available amenities is here |

### Retrieve Properties
```php
Stays::content()->properties()->search(array $parameters);
```

<details>
  <summary>Parameters</summary>

| Parameter | Type    | Description                                                                    |
|:----------|:--------|:-------------------------------------------------------------------------------|
| status    | String  | Property status. Accepts values ['active','inactive','draft']                  |
| skip      | Integer | Number of records to skip. Used to build proper pagination. Default value is 0 |
| limit     | Integer | Maximum number of records to return. Default and maximum value is 20           |

</details>

