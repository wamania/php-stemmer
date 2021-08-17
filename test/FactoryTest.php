<?php

namespace Wamania\Snowball\Tests;

use PHPUnit\Framework\TestCase;
use Wamania\Snowball\StemmerFactory;

class FactoryTest extends TestCase
{
    public function testFactory()
    {
        $isoCodes = [
            'ca' => 'Wamania\\Snowball\\Stemmer\\Catalan',
            'cat' => 'Wamania\\Snowball\\Stemmer\\Catalan',
            'catalan' => 'Wamania\\Snowball\\Stemmer\\Catalan',
            'da' => 'Wamania\\Snowball\\Stemmer\\Danish',
            'dan' => 'Wamania\\Snowball\\Stemmer\\Danish',
            'danish' => 'Wamania\\Snowball\\Stemmer\\Danish',
            'nl' => 'Wamania\\Snowball\\Stemmer\\Dutch',
            'dut' => 'Wamania\\Snowball\\Stemmer\\Dutch',
            'nld' => 'Wamania\\Snowball\\Stemmer\\Dutch',
            'dutch' => 'Wamania\\Snowball\\Stemmer\\Dutch',
            'en' => 'Wamania\\Snowball\\Stemmer\\English',
            'eng' => 'Wamania\\Snowball\\Stemmer\\English',
            'english' => 'Wamania\\Snowball\\Stemmer\\English',
            'fr' => 'Wamania\\Snowball\\Stemmer\\French',
            'fre' => 'Wamania\\Snowball\\Stemmer\\French',
            'fra' => 'Wamania\\Snowball\\Stemmer\\French',
            'french' => 'Wamania\\Snowball\\Stemmer\\French',
            'de' => 'Wamania\\Snowball\\Stemmer\\German',
            'deu' => 'Wamania\\Snowball\\Stemmer\\German',
            'ger' => 'Wamania\\Snowball\\Stemmer\\German',
            'german' => 'Wamania\\Snowball\\Stemmer\\German',
            'it' => 'Wamania\\Snowball\\Stemmer\\Italian',
            'ita' => 'Wamania\\Snowball\\Stemmer\\Italian',
            'italian' => 'Wamania\\Snowball\\Stemmer\\Italian',
            'no' => 'Wamania\\Snowball\\Stemmer\\Norwegian',
            'nor' => 'Wamania\\Snowball\\Stemmer\\Norwegian',
            'norwegian' => 'Wamania\\Snowball\\Stemmer\\Norwegian',
            'pt' => 'Wamania\\Snowball\\Stemmer\\Portuguese',
            'por' => 'Wamania\\Snowball\\Stemmer\\Portuguese',
            'portuguese' => 'Wamania\\Snowball\\Stemmer\\Portuguese',
            'ro' => 'Wamania\\Snowball\\Stemmer\\Romanian',
            'rum' => 'Wamania\\Snowball\\Stemmer\\Romanian',
            'ron' => 'Wamania\\Snowball\\Stemmer\\Romanian',
            'romanian' => 'Wamania\\Snowball\\Stemmer\\Romanian',
            'ru' => 'Wamania\\Snowball\\Stemmer\\Russian',
            'rus' => 'Wamania\\Snowball\\Stemmer\\Russian',
            'russian' => 'Wamania\\Snowball\\Stemmer\\Russian',
            'es' => 'Wamania\\Snowball\\Stemmer\\Spanish',
            'spa' => 'Wamania\\Snowball\\Stemmer\\Spanish',
            'spanish' => 'Wamania\\Snowball\\Stemmer\\Spanish',
            'sv' => 'Wamania\\Snowball\\Stemmer\\Swedish',
            'swe' => 'Wamania\\Snowball\\Stemmer\\Swedish',
            'swedish' => 'Wamania\\Snowball\\Stemmer\\Swedish',
        ];

        foreach ($isoCodes as $isoCode => $classname) {
            $stemmer = StemmerFactory::create($isoCode);

            $this->assertTrue($stemmer instanceof $classname);
        }
    }
}
