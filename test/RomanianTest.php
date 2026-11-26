<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Romanian;

class RomanianTest extends StemmingTest
{
    protected $class = Romanian::class;
    protected $file = 'ro';

    /**
     * @dataProvider icatorProvider
     */
    public function testIcatorSuffix($word, $stem)
    {
        $o = new Romanian();

        $this->assertEquals($stem, $o->stem($word));
    }

    public function icatorProvider()
    {
        return [
            ['duplicator', 'duplic'],
            ['indicator', 'indic'],
            ['indicatorul', 'indic'],
        ];
    }
}
