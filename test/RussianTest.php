<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Russian;

class RussianTest extends TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        $o = new Russian();

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }

    public function load()
    {
        return new CsvFileIterator('test/files/ru.txt');
    }
}
