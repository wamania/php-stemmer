<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\German;

class GermanTest extends StemmingTest
{
    protected $class = German::class;
    protected $file = 'de';
}
