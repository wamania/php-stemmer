<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Romanian;

class RomanianTest extends StemmingTest
{
    protected $class = Romanian::class;
    protected $file = 'ro';
}
