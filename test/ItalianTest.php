<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Italian;

class ItalianTest extends StemmingTest
{
    protected $class = Italian::class;
    protected $file = 'it';
}
