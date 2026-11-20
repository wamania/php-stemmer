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

    public function testStemReusedInstance()
    {
        $o = new Finnish();

        // "taloissa" removes a case ending in step 3; that must not change
        // how the next word is stemmed by the same instance.
        $this->assertEquals('talo', $o->stem('taloissa'));
        $this->assertEquals('aago', $o->stem('aagot'));
        $this->assertEquals('haalar', $o->stem('haalarit'));
    }

    public function load()
    {
        return new CsvFileIterator('test/files/fi.txt');
    }
}
