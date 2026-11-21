<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\French;

class FrenchTest extends StemmingTest
{
    protected $class = French::class;
    protected $file = 'fr';
}
