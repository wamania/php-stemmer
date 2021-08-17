<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Italian;

class ItalianTest extends TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        $o = new Italian();

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }

    public function load()
    {
        return new CsvFileIterator('test/files/it.txt');
    }
}
