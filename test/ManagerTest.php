<?php

namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\StemmerManager;

class ManagerTest extends TestCase
{
    public function testManager()
    {
        $stemmerManager = new StemmerManager();

        $this->assertEquals('anticonstitutionnel', $stemmerManager->stem('anticonstitutionnelement', 'fr'));
    }
}
