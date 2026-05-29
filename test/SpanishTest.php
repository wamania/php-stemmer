<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Spanish;

class SpanishTest extends StemmingTest
{
    protected $class = Spanish::class;
    protected $file = 'es';
}
