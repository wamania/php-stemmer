<?php
/**
 * Greek stemmer test.
 *
 * @author msaari <mikko@mikkosaari.fi>
 */

namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Greek;

/**
 * Tests the Greek stemmer.
 *
 * @author msaari <mikko@mikkosaari.fi>
 *
 * @group greek
 */
class GreekTest extends TestCase
{

    public function testWords()
    {
        $o = new Greek();
        $stem = $o->stem('ΆΓΡΑΩΟΥς');
        $this->assertEquals('αγραφ', $stem);
    }

    /**
     * Tests stemmed words to see if they match the correct stem.
     *
     * @param $word string Original word.
     * @param $stem string Stemmed word.
     *
     * @dataProvider load
     */
/*    public function testStem($word, $stem)
    {
        $o = new Greek();

        $snowballStem = $o->stem($word);

        $this->assertEquals($stem, $snowballStem);
    }
*/
    /**
     * Loads the word list file.
     *
     * @return CsvFileIterator The Greek word list.
     */
    /*
    public function load()
    {
        return new CsvFileIterator('test/files/el.txt');
    }
    */
}
