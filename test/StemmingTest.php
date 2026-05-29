<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;

abstract class StemmingTest extends TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        $o = new $this->class;

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }

    public function load()
    {
        return new CsvFileIterator('test/files/' . $this->file . '.txt');
    }
}
