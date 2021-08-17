<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Finnish;

class FinnishTest extends TestCase
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
