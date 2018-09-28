# php-stemmer

PHP5 native implementation of Snowball stemmer
http://snowball.tartarus.org/

Accept only UTF-8

* [Languages](#languages)
* [Installation](#installation)
* [Usage](#usage)

Languages
------------
Available : 
- English
- French
- German
- Italian
- Spanish
- Portuguese
- Romanian
- Dutch
- Swedish
- Norwegian
- Danish
- Russian

Next : 
 - Finnish 

Installation
------------

With composer :

``` bash
composer require wamania/php-stemmer
```

Usage
-----

In your code:

``` php
use Wamania\Snowball\French;

$stemmer = new French();
$stem = $stemmer->stem('anticonstitutionnellement');
```
