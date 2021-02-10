<?php
namespace Wamania\Snowball\Tests;

use Wamania\Snowball\Stemmer\Catalan;

class CatalanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        $o = new Catalan();

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }

    public function load()
    {
        return new CsvFileVerboseIterator('test/files/ca.txt');
    }
}
