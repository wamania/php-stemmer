<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Russian;

class RussianTest extends StemmingTest
{
    protected $class = Russian::class;
    protected $file = 'ru';
}
