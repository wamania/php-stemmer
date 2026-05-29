<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Danish;

class DanishTest extends StemmingTest
{
    protected $class = Danish::class;
    protected $file = 'dk';
}
