<?php
namespace Wamania\Snowball\Tests;

use Wamania\Snowball\Stemmer\Finnish;

class FinnishTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        $o = new Finnish();

        $snowballStem = $o->stem($word);

		$this->assertEquals($stem, $snowballStem);
    }

    public function load()
    {
        return new CsvFileIterator('test/files/fi.txt');
    }
}
