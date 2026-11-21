<?php
namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\Stemmer\Finnish;

class FinnishTest extends StemmingTest
{
    protected $class = Finnish::class;
    protected $file = 'fi';

    public function testStemReusedInstance()
    {
        $o = new Finnish();

        // "taloissa" removes a case ending in step 3; that must not change
        // how the next word is stemmed by the same instance.
        $this->assertEquals('talo', $o->stem('taloissa'));
        $this->assertEquals('aago', $o->stem('aagot'));
        $this->assertEquals('haalar', $o->stem('haalarit'));
    }
}
