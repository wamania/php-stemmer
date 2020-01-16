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
- Danish
- Dutch
- English
- French
- German
- Italian
- Norwegian
- Portuguese
- Romanian
- Russian
- Spanish
- Swedish

Next : 
 - Finnish 

Installation
------------

For PHP5, use 1.3
```
composer require wamania/php-stemmer "^1.3"
```

For PHP7 use 2.x (branch 2.x is backward compatible with 1.x)
```
composer require wamania/php-stemmer "^2.0"
```

Usage
-----

For 2.x, you should use the factory
```php
// use ISO_639 (2 or 3 letters) or language name in english
$stemmer = StemmerFactory::create('fr');
$stemmer = StemmerFactory::create ('spanish');

// then 
$stem = $stemmer->stem('automóvil');
```

Or the manager
```php
$manager = new StemmerManager();
$stem = $manager->stem('automóvil', 'es');
```

In 1.3, you must instantiate manually

```php
use Wamania\Snowball\French;

$stemmer = new French();
$stem = $stemmer->stem('anticonstitutionnellement');
```

