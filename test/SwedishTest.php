<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Swedish;

class SwedishTest extends StemmingTest
{
    protected $class = Swedish::class;
    protected $file = 'sw';
}
