<?php
namespace Tests\SnowBall;

require_once 'CsvFileIterator.php';

use Wamania\Snowball\Portuguese;

class PortugueseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider load
     */
    public function testStem($word, $stem)
    {
        /*$words = array(
            'viciados' => 'vic',
        );*/

        //foreach ($words as $word => $stem) {
            $o = new Portuguese();

            $snowballStem = $o->stem($word);

            $this->assertEquals($stem, $snowballStem);
        //}
    }

    public function load()
    {
        return new \CsvFileIterator('test/files/pt.txt');
    }
}