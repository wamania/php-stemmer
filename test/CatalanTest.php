<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Catalan;

class CatalanTest extends StemmingTest
{
    protected $class = Catalan::class;
    protected $file = 'ca';
}
