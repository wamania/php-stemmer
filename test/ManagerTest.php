<?php

namespace Wamania\Snowball\Tests;

use Wamania\Snowball\StemmerManager;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testManager()
    {
        $stemmerManager = new StemmerManager();

        $this->assertEquals('anticonstitutionnel', $stemmerManager->stem('anticonstitutionnelement', 'fr'));
    }
}
