# php-stemmer
Native PHP5 Stemmer

PHP native implementation of Snowball stemmer
http://snowball.tartarus.org/

* [Installation](#installation)
* [Usage](#usage)


Installation
------------

Require [`wamania/php-stemmer`](https://packagist.org/packages/wamania/php-stemmer)
into your `composer.json` file:


``` json
{
    "require": {
        "wamania/php-stemmer": "dev-master"
    }
}
```

Usage
-----

In your controller :

``` php
use Wamania\Snowball\French;

$stem = French::stem('anticonstitutionnellement');
```
