majkel toolbox
==============

Toolbox library containing various utilities

## Table of Contents

1. [DateTime](#datetime)
    1. [Clarion date](#clarion-date)
    2. [Comarch date](#comarch-date)

# DateTime

Utilities to manipulate date and time.

## Clarion date

Converts Clarion date to DateTime and vice versa

````php
require_once 'vendor/autoload.php';

use org\majkel\toolbox\datetime\Clarion;

// test if value is valid Carion date
$valid = Clarion::isValid(77028);

// convert Clarion date to DateTime
$dateTime = Clarion::toDate(77028);

// convert DateTime to Clarion date
$clarionTimestamp = Clarion::fromDate(new \DateTime());
````

## Comarch date

Converts Comarch Optima XL date to DateTime and vice versa

````php
require_once 'vendor/autoload.php';

use org\majkel\toolbox\datetime\Comarch;

// test if value is valid Comarch date
$valid = Comarch::isValid(690598877);

// convert Comarch date to DateTime
$dateTime = Comarch::toDate(690598877);

// convert DateTime to Comarch date
$clarionTimestamp = Comarch::fromDate(new \DateTime());
````
