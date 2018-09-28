<?php
namespace Wamania\Snowball;

/**
 *
 * @link http://snowball.tartarus.org/algorithms/finnish/stemmer.html
 * @author wamania
 *
 */
class Finnish extends Stem
{
    /**
     * All swedish vowels
     */
    protected static $vowels = array('a', 'e', 'i', 'o', 'u', 'y', 'ä', 'ö');

    /**
     * {@inheritdoc}
     */
    public function stem($word)
    {
        // we do ALL in UTF-8
        if (! Utf8::check($word)) {
            throw new \Exception('Word must be in UTF-8');
        }

        $this->word = Utf8::strtolower($word);

        // R1 and R2 are then defined in the usual way
        $this->r1();
        $this->r2();

        // Do each of steps 1, 2 3, 4, 5 and 6.
        $this->step1();
        $this->step2();
        $this->step3();

        return $this->word;
    }

    /**
     * Step 1
     * Search for the longest among the following suffixes in R1, and perform the action indicated
     */
    private function step1()
    {
        // (a) kin   kaan   kään   ko   kö   han   hän   pa   pä
        //      delete if preceded by n, t or a vowel
        if ( ($position = $this->searchIfInR1(array(
            'kin', 'kaan', 'kään', 'ko', 'kö', 'han', 'hän', 'pa', 'pä'
        ))) !== false) {
            $word = Utf8::substr($this->word, 0, $position);
            $lastLetter = substr($word, -1, 1);

            if (in_array($lastLetter, array_merge(['t', 'n'], self::$vowels))) {
                $this->word = $word;
            }

            return true;
        }

        //  sti
        //  delete if in R2
        if ( ($position = $this->searchIfInR1(array('sti'))) !== false) {
            if ($this->inR2($position)) {
                $this->word = Utf8::substr($this->word, 0, $position);
            }

            return true;
        }
    }

    /**
     * Step 2: possessives
     * Search for the longest among the following suffixes in R1, and perform the action indicated
     */
    private function step2()
    {

    }

    /**
     *
     * Step 3: cases
     * Search for the longest among the following suffixes in R1, and perform the action indicated
     */
    private function step3()
    {

    }

    /**
     * Step 4: other endings
     * Search for the longest among the following suffixes in R2, and perform the action indicated
     */
    private function step4()
    {

    }

    /**
     * Step 5: plurals
     * If an ending was removed in step 3, delete a final i or j if in R1; otherwise,
     * if an ending was not removed in step 3, delete a final t in R1 if it follows a vowel,
     * and, if a t is removed, delete a final mma or imma in R2, unless the mma is preceded by po.
     */
    private function step5()
    {

    }

    /**
     * Step 6: tidying up
     * Do in turn steps (a), (b), (c), (d), restricting all tests to the region R1.
     */
    private function step6()
    {

    }
}
