<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Portuguese;

class PortugueseTest extends TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem): void
    {
        $o = new Portuguese();

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }

    public function load(): \Wamania\Snowball\Tests\CsvFileIterator
    {
        return new CsvFileIterator('test/files/pt.txt');
    }
}
