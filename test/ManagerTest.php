<?php

declare(strict_types=1);

namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\StemmerManager;

class ManagerTest extends TestCase
{
    public function testManager(): void
    {
        $stemmerManager = new StemmerManager();

        $this->assertEquals('anticonstitutionnel', $stemmerManager->stem('anticonstitutionnelement', 'fr'));
    }
}
