majkel toolbox
==============

[![Build Status](https://travis-ci.org/majkel89/toolbox.svg?branch=master)](https://travis-ci.org/majkel89/toolbox)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9766f072-521f-4e03-807e-e39182c72d53/mini.png)](https://insight.sensiolabs.com/projects/9766f072-521f-4e03-807e-e39182c72d53)
[![Latest Stable Version](https://poser.pugx.org/org.majkel/toolbox/v/stable)](https://packagist.org/packages/org.majkel/toolbox)
[![Total Downloads](https://poser.pugx.org/org.majkel/toolbox/downloads)](https://packagist.org/packages/org.majkel/toolbox)
[![Latest Unstable Version](https://poser.pugx.org/org.majkel/toolbox/v/unstable)](https://packagist.org/packages/org.majkel/toolbox)
![PHP Version](https://img.shields.io/badge/version-PHP%205.3%2B-lightgrey.svg)
[![License](https://poser.pugx.org/org.majkel/toolbox/license)](https://packagist.org/packages/org.majkel/toolbox)

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
