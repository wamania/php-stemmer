<?php
namespace Tests\SnowBall;

require_once 'CsvFileIterator.php';

use Wamania\Snowball\German;

class GermanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        /*$words = array(
            'paguen' => 'pag',
        );*/

        //foreach ($words as $word => $stem) {
            $o = new German();

            $snowballStem = $o->stem($word);

            $this->assertEquals($stem, $snowballStem);
        //}
    }

    public function load()
    {
        return new \CsvFileIterator('test/files/de.txt');
    }
}