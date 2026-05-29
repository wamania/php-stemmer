<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Norwegian;

class NorwegianTest extends StemmingTest
{
    protected $class = Norwegian::class;
    protected $file = 'no';
}
