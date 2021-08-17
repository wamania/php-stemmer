<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Norwegian;

class NorwegianTest extends TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        $o = new Norwegian();

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }

    public function load()
    {
        return new CsvFileIterator('test/files/no.txt');
    }
}
