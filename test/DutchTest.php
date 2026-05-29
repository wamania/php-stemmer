<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Dutch;

class DutchTest extends StemmingTest
{
    protected $class = Dutch::class;
    protected $file = 'nl';
}
