<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\English;

class EnglishTest extends StemmingTest
{
    protected $class = English::class;
    protected $file = 'en';
}
