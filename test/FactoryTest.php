<?php

declare(strict_types=1);

namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\StemmerFactory;

class FactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $isoCodes = [
            'ca' => \Wamania\Snowball\Stemmer\Catalan::class,
            'cat' => \Wamania\Snowball\Stemmer\Catalan::class,
            'catalan' => \Wamania\Snowball\Stemmer\Catalan::class,
            'da' => \Wamania\Snowball\Stemmer\Danish::class,
            'dan' => \Wamania\Snowball\Stemmer\Danish::class,
            'danish' => \Wamania\Snowball\Stemmer\Danish::class,
            'nl' => \Wamania\Snowball\Stemmer\Dutch::class,
            'dut' => \Wamania\Snowball\Stemmer\Dutch::class,
            'nld' => \Wamania\Snowball\Stemmer\Dutch::class,
            'dutch' => \Wamania\Snowball\Stemmer\Dutch::class,
            'en' => \Wamania\Snowball\Stemmer\English::class,
            'eng' => \Wamania\Snowball\Stemmer\English::class,
            'english' => \Wamania\Snowball\Stemmer\English::class,
            'fr' => \Wamania\Snowball\Stemmer\French::class,
            'fre' => \Wamania\Snowball\Stemmer\French::class,
            'fra' => \Wamania\Snowball\Stemmer\French::class,
            'french' => \Wamania\Snowball\Stemmer\French::class,
            'de' => \Wamania\Snowball\Stemmer\German::class,
            'deu' => \Wamania\Snowball\Stemmer\German::class,
            'ger' => \Wamania\Snowball\Stemmer\German::class,
            'german' => \Wamania\Snowball\Stemmer\German::class,
            'it' => \Wamania\Snowball\Stemmer\Italian::class,
            'ita' => \Wamania\Snowball\Stemmer\Italian::class,
            'italian' => \Wamania\Snowball\Stemmer\Italian::class,
            'no' => \Wamania\Snowball\Stemmer\Norwegian::class,
            'nor' => \Wamania\Snowball\Stemmer\Norwegian::class,
            'norwegian' => \Wamania\Snowball\Stemmer\Norwegian::class,
            'pt' => \Wamania\Snowball\Stemmer\Portuguese::class,
            'por' => \Wamania\Snowball\Stemmer\Portuguese::class,
            'portuguese' => \Wamania\Snowball\Stemmer\Portuguese::class,
            'ro' => \Wamania\Snowball\Stemmer\Romanian::class,
            'rum' => \Wamania\Snowball\Stemmer\Romanian::class,
            'ron' => \Wamania\Snowball\Stemmer\Romanian::class,
            'romanian' => \Wamania\Snowball\Stemmer\Romanian::class,
            'ru' => \Wamania\Snowball\Stemmer\Russian::class,
            'rus' => \Wamania\Snowball\Stemmer\Russian::class,
            'russian' => \Wamania\Snowball\Stemmer\Russian::class,
            'es' => \Wamania\Snowball\Stemmer\Spanish::class,
            'spa' => \Wamania\Snowball\Stemmer\Spanish::class,
            'spanish' => \Wamania\Snowball\Stemmer\Spanish::class,
            'sv' => \Wamania\Snowball\Stemmer\Swedish::class,
            'swe' => \Wamania\Snowball\Stemmer\Swedish::class,
            'swedish' => \Wamania\Snowball\Stemmer\Swedish::class,
        ];

        foreach ($isoCodes as $isoCode => $classname) {
            $stemmer = StemmerFactory::create($isoCode);

            $this->assertTrue($stemmer instanceof $classname);
        }
    }
}
