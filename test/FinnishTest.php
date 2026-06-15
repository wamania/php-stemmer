<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Finnish;

class FinnishTest extends TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem): void
    {
        $o = new Finnish();

        $snowballStem = $o->stem($word);

		$this->assertEquals($stem, $snowballStem);
    }

    public function load(): \Wamania\Snowball\Tests\CsvFileIterator
    {
        return new CsvFileIterator('test/files/fi.txt');
    }
}
