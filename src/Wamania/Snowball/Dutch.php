<?php
namespace Wamania\Snowball;

/**
 *
 * @link http://snowball.tartarus.org/algorithms/dutch/stemmer.html
 * @author wamania
 *
 */
class Dutch extends Stem
{
    /**
     * All dutch vowels
     */
    protected static $vowels = array('a', 'e', 'i', 'o', 'u', 'y', 'è');

    /**
     * Main function to get the STEM of a word
     * The word in param MUST BE IN UTF-8
     *
     * @param string $word
     * @throws \Exception
     * @return NULL|string
     */
    public function stem($word)
    {
        // we do ALL in UTF-8
        if (! Utf8::check($word)) {
            throw new \Exception('Word must be in UTF-8');
            return null;
        }

        $this->word = Utf8::strtolower($word);

        $this->rv();
        $this->r1();
        $this->r2();

        $this->step0();


        return $this->word;
    }


    private function step0()
    {

    }
}