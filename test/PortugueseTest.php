<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Portuguese;

class PortugueseTest extends StemmingTest
{
    protected $class = Portuguese::class;
    protected $file = 'pt';
}
