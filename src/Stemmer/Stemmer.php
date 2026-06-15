<?php

declare(strict_types=1);

namespace Wamania\Snowball\Stemmer;

/**
 * @author Luís Cobucci <lcobucci@gmail.com>
 */
interface Stemmer
{
    /**
     * Main function to get the STEM of a word
     *
     * @param string $word A valid UTF-8 word
     *
     * @return string
     *
     * @throws \Exception
     */
    public function stem($word);
}
