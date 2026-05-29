<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Finnish;

class FinnishTest extends StemmingTest
{
    protected $class = Finnish::class;
    protected $file = 'fi';
}
