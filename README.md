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





---


## Booking Checkout API

### Initiate checkout process
```php 
Stays::bookRequest(array $parameters);
```
|  Parameter   | Type                             |                                      Description                                      |
|--------------|----------------------------------|---------------------------------------------------------------------------------------|
|     from     | ISO date string ```YYYY-MM-DD``` |                                  booking start date                                   |
|      to      | ISO date string ```YYYY-MM-DD``` |                                   booking end date                                    |
|    aptid     | String                           |                              Stays apartment identifier                               |
|   persons    | Integer                          |                     total guests number (Optional. Default is 1)                      |
|    client    | Object                           |                               client who makes booking                                |
| client.email | String                           | email address of client (will use to search if client already exists in Stays system) |
| client.fName | String                           |                                   client first name                                   |
| cient.lName  | String                           |                                   client last name                                    |


## Promo code API

### Create promo code
```php
Stays::booking()->promoCodes()->create(array $parameters);
```
|                    Parameter                    | Type                             |                                               Description                                               |
|-------------------------------------------------|----------------------------------|---------------------------------------------------------------------------------------------------------|
|                     name *                      | String                           |                                             Promo code name                                             |
|                     type *                      | String                           |                          Promo code discount type. Can be 'fixed' or 'percent'                          |
|                   _f_discount                   | Number                           |                                     Promo code percentage discount                                      |
|                   _mcdiscount                   | Object                           |                              Promo code fixed discount with mutlicurrency                               |
|                     status                      | String                           |                            Promo code status. Can be 'active' or 'inactive'                             |
|                  maxUsesCount                   | Integer                          |                              Define, how many times promo code can be used                              |
|             useWithOtherPromotions              | Boolean                          |                           Can promocode be applied if other promotions exists                           |
|               periodRestrictions                | Object                           |                          Defines general restrictions for date range of using                           |
|            periodRestrictions.enable            | Boolean                          |                                  Indicates if restrictions are active                                   |
|             periodRestrictions.from             | ISO date string ```YYYY-MM-DD``` |                                Start date when promocode can be applied                                 |
|              periodRestrictions.to              | ISO date string ```YYYY-MM-DD``` |                                 End date when promocode can be applied                                  |
|      periodRestrictions.invalidDaysOfWeek       | Array                            | Days of week, when promocode cannot be applied. Possible values are 1-7. Where 1 is Monday, 7 is Sunday |
|              calendarRestrictions               | Object                           |                                      Defines calendar restrictions                                      |
|           calendarRestrictions.enable           | Boolean                          |                                  Indicates if restrictions are active                                   |
|     calendarRestrictions.validArrivalDates      | Object                           |                      Defines date range for arrival, when promocode can be applied                      |
|   calendarRestrictions.validArrivalDates.from   | ISO date string ```YYYY-MM-DD``` |                            Start arrival date when promocode can be applied                             |
|    calendarRestrictions.validArrivalDates.to    | ISO date string ```YYYY-MM-DD``` |                             End arrival date when promocode can be applied                              |
|    calendarRestrictions.invalidArrivalDates     | Object                           |                    Defines date range for arrival, when promocode cannot be applied                     |
|  calendarRestrictions.invalidArrivalDates.from  | ISO date string ```YYYY-MM-DD``` |                           Start arrival date when promocode cannot be applied                           |
|   calendarRestrictions.invalidArrivalDates.to   | ISO date string ```YYYY-MM-DD``` |                            End arrival date when promocode cannot be applied                            |
|    calendarRestrictions.validDepartureDates     | Object                           |                    Defines date range for departuren, when promocode can be applied                     |
|  calendarRestrictions.validDepartureDates.from  | ISO date string ```YYYY-MM-DD``` |                           Start departure date when promocode can be applied                            |
|   calendarRestrictions.validDepartureDates.to   | ISO date string ```YYYY-MM-DD``` |                            End departure date when promocode can be applied                             |
|   calendarRestrictions.invalidDepartureDates    | Object                           |                   Defines date range for departure, when promocode cannot be applied                    |
| calendarRestrictions.invalidDepartureDates.from | ISO date string ```YYYY-MM-DD``` |                          Start departure date when promocode cannot be applied                          |
|  calendarRestrictions.invalidDepartureDates.to  | ISO date string ```YYYY-MM-DD``` |                           End departure date when promocode cannot be applied                           |
|      calendarRestrictions.minLengthOfStay       | Integer                          |                Indicates minimum nights number of booking when promocode can be applied                 |
|               productRestrictions               | Object                           |                          Defines product restrictions using bedrooms or groups                          |
|           productRestrictions.enable            | Boolean                          |                                  Indicates if restrictions are active                                   |
|          productRestrictions.bedgrooms          | Array                            |               Defines bedrooms numbers for what promo code is applicable. For Studio is 0               |
|           productRestrictions.groups            | Array                            |                      Defines groups identifiers for what promo code is applicable.                      |
|                userRestrictions                 | Object                           |                                        Defines user restrictions                                        |
|             userRestrictions.enable             | Boolean                          |                                  Indicates if restrictions are active                                   |
|             userRestrictions.emails             | Array                            |                    Defines list of guests emails for what promo code is applicable.                     |
|            userRestrictions.clients             | Array                            |                 Defines list of clients identifiers for what promo code is applicable.                  |
|      userRestrictions.minReservationsCount      | Integer                          |           Defines min number of previous guest's reservations after promo code will be valid            |
|     userRestrictions.minAmountSpentByGuest      | Number                           |              Defines min amount of money that guest spent before to make promo code valid               |
|         userRestrictions.maxGuestsCount         | Integer                          |                                Defines max guests count for reservations                                |

### Get promo code
```php
Stays::booking()->promoCodes()->get(string $id);
```

### Modify promo code
```php
Stays::booking()->promoCodes()->update(string $id, array $parameters);
```
|                    Parameter                    | Type                             |                                               Description                                               |
|-------------------------------------------------|----------------------------------|---------------------------------------------------------------------------------------------------------|
|                     name *                      | String                           |                                             Promo code name                                             |
|                     type *                      | String                           |                          Promo code discount type. Can be 'fixed' or 'percent'                          |
|                   _f_discount                   | Number                           |                                     Promo code percentage discount                                      |
|                   _mcdiscount                   | Object                           |                              Promo code fixed discount with mutlicurrency                               |
|                     status                      | String                           |                            Promo code status. Can be 'active' or 'inactive'                             |
|                  maxUsesCount                   | Integer                          |                              Define, how many times promo code can be used                              |
|             useWithOtherPromotions              | Boolean                          |                           Can promocode be applied if other promotions exists                           |
|               periodRestrictions                | Object                           |                          Defines general restrictions for date range of using                           |
|            periodRestrictions.enable            | Boolean                          |                                  Indicates if restrictions are active                                   |
|             periodRestrictions.from             | ISO date string ```YYYY-MM-DD``` |                                Start date when promocode can be applied                                 |
|              periodRestrictions.to              | ISO date string ```YYYY-MM-DD``` |                                 End date when promocode can be applied                                  |
|      periodRestrictions.invalidDaysOfWeek       | Array                            | Days of week, when promocode cannot be applied. Possible values are 1-7. Where 1 is Monday, 7 is Sunday |
|              calendarRestrictions               | Object                           |                                      Defines calendar restrictions                                      |
|           calendarRestrictions.enable           | Boolean                          |                                  Indicates if restrictions are active                                   |
|     calendarRestrictions.validArrivalDates      | Object                           |                      Defines date range for arrival, when promocode can be applied                      |
|   calendarRestrictions.validArrivalDates.from   | ISO date string ```YYYY-MM-DD``` |                            Start arrival date when promocode can be applied                             |
|    calendarRestrictions.validArrivalDates.to    | ISO date string ```YYYY-MM-DD``` |                             End arrival date when promocode can be applied                              |
|    calendarRestrictions.invalidArrivalDates     | Object                           |                    Defines date range for arrival, when promocode cannot be applied                     |
|  calendarRestrictions.invalidArrivalDates.from  | ISO date string ```YYYY-MM-DD``` |                           Start arrival date when promocode cannot be applied                           |
|   calendarRestrictions.invalidArrivalDates.to   | ISO date string ```YYYY-MM-DD``` |                            End arrival date when promocode cannot be applied                            |
|    calendarRestrictions.validDepartureDates     | Object                           |                    Defines date range for departuren, when promocode can be applied                     |
|  calendarRestrictions.validDepartureDates.from  | ISO date string ```YYYY-MM-DD``` |                           Start departure date when promocode can be applied                            |
|   calendarRestrictions.validDepartureDates.to   | ISO date string ```YYYY-MM-DD``` |                            End departure date when promocode can be applied                             |
|   calendarRestrictions.invalidDepartureDates    | Object                           |                   Defines date range for departure, when promocode cannot be applied                    |
| calendarRestrictions.invalidDepartureDates.from | ISO date string ```YYYY-MM-DD``` |                          Start departure date when promocode cannot be applied                          |
|  calendarRestrictions.invalidDepartureDates.to  | ISO date string ```YYYY-MM-DD``` |                           End departure date when promocode cannot be applied                           |
|      calendarRestrictions.minLengthOfStay       | Integer                          |                Indicates minimum nights number of booking when promocode can be applied                 |
|               productRestrictions               | Object                           |                          Defines product restrictions using bedrooms or groups                          |
|           productRestrictions.enable            | Boolean                          |                                  Indicates if restrictions are active                                   |
|          productRestrictions.bedgrooms          | Array                            |               Defines bedrooms numbers for what promo code is applicable. For Studio is 0               |
|           productRestrictions.groups            | Array                            |                      Defines groups identifiers for what promo code is applicable.                      |
|                userRestrictions                 | Object                           |                                        Defines user restrictions                                        |
|             userRestrictions.enable             | Boolean                          |                                  Indicates if restrictions are active                                   |
|             userRestrictions.emails             | Array                            |                    Defines list of guests emails for what promo code is applicable.                     |
|            userRestrictions.clients             | Array                            |                 Defines list of clients identifiers for what promo code is applicable.                  |
|      userRestrictions.minReservationsCount      | Integer                          |           Defines min number of previous guest's reservations after promo code will be valid            |
|     userRestrictions.minAmountSpentByGuest      | Number                           |              Defines min amount of money that guest spent before to make promo code valid               |
|         userRestrictions.maxGuestsCount         | Integer                          |                                Defines max guests count for reservations                                |

### Delete promo code
```php
Stays::booking()->promoCodes()->delete(string $id);
```

### Search promo codes
```php
Stays::booking()->promoCodes()->search(array $parameters);
```
| Parameter |  Type   |                                  Description                                   |
|-----------|---------|--------------------------------------------------------------------------------|
|   name    | String  |   Promo code name. If it has special symbols, please use encodeURIComponent    |
|  status   | String  |         Promo code status. Possible values are 'active' or 'inactive'          |
|   used    | Boolean |              Search by promo codes that were already used or not               |
|   skip    | Integer | Number of records to skip. Used to build proper pagination. Default value is 0 |
|   limit   | Integer |      Maximum number of records to return. Default and maximum value is 20      |


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
|    from    | ISO date string ```YYYY-MM-DD``` | Booking start date                                                              |
|     to     | ISO date string ```YYYY-MM-DD``` | Booking end date                                                                |
|   guests   | Integer                          | Number of guests                                                                |
|   rooms    | Array [integer]                  | Number of rooms. 0 - Studio, 1 - one room, 2 - two rooms.                       |
|   cities   | Array [string]                   | Array of cities names                                                           |
|  regions   | Array [string]                   | Array of regions names                                                          |
|   states   | Array [string]                   | Array of state names                                                            |
| countries  | Array [string]                   | Array of country codes                                                          |
| properties | Array [string]                   | Array of properties identifiers                                                 |
| amenities  | Array [string]                   | Listing or property amenities as an array of amenity IDs.                       |
| inventory  | Array [string]                   | Rooms inventory as an array of inventory names.                                 |
| listingId  | String                           | Listing identifier (short and long both values accepted)                        |
|    sort    | String                           | Allows to sort result by provided criteria. Possble values are rating           |
|    skip    | Integer                          | Number of records to skip. Used to build proper pagination. Default value is 0  |
|   limit    | Integer                          | Maximum number of records to return. Default and maximum value is 20            |

### Calculate listing price
```php
Stays::booking()->listingPrice()->calculate(array $parameters);
```
| Parameter  | Type                             |                                        Description                                        |
|------------|----------------------------------|-------------------------------------------------------------------------------------------|
| listingIds | Array                            |           Listings identifiers. Both identifiers (long and short) are supported           |
|    from    | ISO date string ```YYYY-MM-DD``` |                                    Booking start date                                     |
|     to     | ISO date string ```YYYY-MM-DD``` |                                     Booking end date                                      |
|   guests   | Integer                          |                                     Number of guests                                      |
| promocode  | String                           | Promo code name or identifier. If name has special symbols, please use encodeURIComponent |

### Create blocking
```php
Stays::booking()->blocking()->create(array $parameters);
```
|     Parameter      | Type                             |                          Description                           |
|--------------------|----------------------------------|----------------------------------------------------------------|
|       type *       | String                           | Blocking type. Possible values are "blocked" or "maintenance"  |
|    listingId *     | String                           |    Listing identifier (short and long both values accepted)    |
|   checkInDate *    | ISO date string ```YYYY-MM-DD``` |                           Start date                           |
|    checkInTime     | String HH:mm                     | Start time. If ommited, default check-in time will be applied  |
|   checkOutDate *   | ISO date string ```YYYY-MM-DD``` |                            End date                            |
|    checkOutTime    | String HH:mm                     |  End time. If ommited, default check-out time will be applied  |
|    internalNote    | String                           |                     Some description text                      |
| cleaningTaskBefore | Boolean                          | Indicates, if system should creates cleaning task before start |
| cleaningTaskAfter  | Boolean                          |  Indicates, if system should creates cleaning task after end   |

### Modify blocking
```php
Stays::booking()->blocking()->update(array $parameters);
```
|     Parameter      | Type                             |                          Description                           |
|--------------------|----------------------------------|----------------------------------------------------------------|
|       type *       | String                           | Blocking type. Possible values are "blocked" or "maintenance"  |
|    checkInDate     | ISO date string ```YYYY-MM-DD``` |                           Start date                           |
|    checkInTime     | String HH:mm                     | Start time. If ommited, default check-in time will be applied  |
|    checkOutDate    | ISO date string ```YYYY-MM-DD``` |                            End date                            |
|    checkOutTime    | String HH:mm                     |  End time. If ommited, default check-out time will be applied  |
|    internalNote    | String                           |                     Some description text                      |
| cleaningTaskBefore | Boolean                          | Indicates, if system should creates cleaning task before start |
| cleaningTaskAfter  | Boolean                          |  Indicates, if system should creates cleaning task after end   |

### Delete blocking
```php
Stays::booking()->blocking()->delete(string $id);
```
