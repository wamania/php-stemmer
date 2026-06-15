<?php

namespace Wamania\Snowball\Stemmer;

use voku\helper\UTF8;

/**
 * English Porter 2
 *
 * @link http://snowball.tartarus.org/algorithms/english/stemmer.html
 * @author wamania
 *
 */
class English extends Stem
{
    /**
     * All english vowels
     */
    protected static $vowels = ['a', 'e', 'i', 'o', 'u', 'y'];

    protected static $doubles = ['bb', 'dd', 'ff', 'gg', 'mm', 'nn', 'pp', 'rr', 'tt'];

    protected static $liEnding = ['c', 'd', 'e', 'g', 'h', 'k', 'm', 'n', 'r', 't'];

    /**
     * {@inheritdoc}
     */
    public function stem($word)
    {
        // we do ALL in UTF-8
        if (!UTF8::is_utf8($word)) {
            throw new \Exception('Word must be in UTF-8');
        }

        if (Utf8::strlen($word) < 3) {
            return $word;
        }

        $this->word = UTF8::strtolower($word);

        // exceptions
        if (null !== ($word = $this->exception1())) {
            return $word;
        }


        $this->plainVowels = implode('', self::$vowels);

        // Remove initial ', if present.
        $first = UTF8::substr($this->word, 0, 1);
        if ($first == "'") {
            $this->word = UTF8::substr($this->word, 1);
        }

        // Set initial y, or y after a vowel, to Y
        if ($first == 'y') {
            $this->word = preg_replace('#^y#u', 'Y', $this->word);
        }
        $this->word = preg_replace('#(['.$this->plainVowels.'])y#u', '$1Y', $this->word);

        $this->r1();
        $this->exceptionR1();
        $this->r2();

        $this->step0();
        $this->step1a();

        // exceptions 2
        if (null !== ($word = $this->exception2())) {
            return $word;
        }

        $this->step1b();
        $this->step1c();
        $this->step2();
        $this->step3();
        $this->step4();
        $this->step5();
        $this->finish();

        return $this->word;
    }

    /**
     * Step 0
     * Remove ', 's, 's'
     */
    private function step0(): void
    {
        if ( ($position = $this->search(["'s'", "'s", "'"])) !== false) {
            $this->word = UTF8::substr($this->word, 0, $position);
        }
    }

    private function step1a(): bool
    {
        // sses
        //      replace by ss
        if ( ($position = $this->search(['sses'])) !== false) {
            $this->word = preg_replace('#(sses)$#u', 'ss', $this->word);
            return true;
        }

        // ied+   ies*
        //      replace by i if preceded by more than one letter, otherwise by ie (so ties -> tie, cries -> cri)
        if ( ($position = $this->search(['ied', 'ies'])) !== false) {
            if ($position > 1) {
                $this->word = preg_replace('#(ied|ies)$#u', 'i', $this->word);

            } else {
                $this->word = preg_replace('#(ied|ies)$#u', 'ie', $this->word);
            }
            return true;
        }

        // us+   ss
        //  do nothing
        if ( ($position = $this->search(['us', 'ss'])) !== false) {
            return true;
        }

        // s
        //      delete if the preceding word part contains a vowel not immediately before the s (so gas and this retain the s, gaps and kiwis lose it)
        if ( ($position = $this->search(['s'])) !== false) {
            for ($i=0; $i<$position-1; $i++) {
                $letter = UTF8::substr($this->word, $i, 1);

                if (in_array($letter, self::$vowels)) {
                    $this->word = UTF8::substr($this->word, 0, $position);
                    return true;
                }
            }
            return true;
        }

        return false;
    }

    /**
     * Step 1b
     */
    private function step1b(): bool
    {
        // eed   eedly+
        //      replace by ee if in R1
        if ( ($position = $this->search(['eedly', 'eed'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(eedly|eed)$#u', 'ee', $this->word);
            }
            return true;
        }

        // ed   edly+   ing   ingly+
        //      delete if the preceding word part contains a vowel, and after the deletion:
        //      if the word ends at, bl or iz add e (so luxuriat -> luxuriate), or
        //      if the word ends with a double remove the last letter (so hopp -> hop), or
        //      if the word is short, add e (so hop -> hope)
        if ( ($position = $this->search(['edly', 'ingly', 'ed', 'ing'])) !== false) {
            for ($i=0; $i<$position; $i++) {
                $letter = UTF8::substr($this->word, $i, 1);

                if (in_array($letter, self::$vowels)) {
                    $this->word = UTF8::substr($this->word, 0, $position);

                    if ($this->search(['at', 'bl', 'iz']) !== false) {
                        $this->word .= 'e';

                    } elseif ( ($position2 = $this->search(self::$doubles)) !== false) {
                        $this->word = UTF8::substr($this->word, 0, ($position2+1));

                    } elseif ($this->isShort()) {
                        $this->word .= 'e';
                    }

                    return true;
                }
            }
            return true;
        }

        return false;
    }

    /**
     * Step 1c: *
     */
    private function step1c(): bool
    {
        // replace suffix y or Y by i if preceded by a non-vowel
        // which is not the first letter of the word (so cry -> cri, by -> by, say -> say)
        $length = UTF8::strlen($this->word);

        if ($length < 3) {
            return true;
        }

        if ( ($position = $this->search(['y', 'Y'])) !== false) {
            $before = $position - 1;
            $letter = UTF8::substr($this->word, $before, 1);

            if (! in_array($letter, self::$vowels)) {
                $this->word = preg_replace('#(y|Y)$#u', 'i', $this->word);
            }

            return true;
        }

        return false;
    }

    /**
     * Step 2
     *  Search for the longest among the following suffixes, and, if found and in R1, perform the action indicated.
     */
    private function step2(): bool
    {
        // iveness   iviti:   replace by ive
        if ( ($position = $this->search(['iveness', 'iviti'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(iveness|iviti)$#u', 'ive', $this->word);
            }
            return true;
        }

        // ousli   ousness:   replace by ous
        if ( ($position = $this->search(['ousli', 'ousness'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(ousli|ousness)$#u', 'ous', $this->word);
            }
            return true;
        }

        // izer   ization:   replace by ize
        if ( ($position = $this->search(['izer', 'ization'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(izer|ization)$#u', 'ize', $this->word);
            }
            return true;
        }

        // ational   ation   ator:   replace by ate
        if ( ($position = $this->search(['ational', 'ation', 'ator'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(ational|ation|ator)$#u', 'ate', $this->word);
            }
            return true;
        }

        // biliti   bli+:   replace by ble
        if ( ($position = $this->search(['biliti', 'bli'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(biliti|bli)$#u', 'ble', $this->word);
            }
            return true;
        }

        // lessli+:   replace by less
        if ( ($position = $this->search(['lessli'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(lessli)$#u', 'less', $this->word);
            }
            return true;
        }

        // fulness:   replace by ful
        if ( ($position = $this->search(['fulness', 'fulli'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(fulness|fulli)$#u', 'ful', $this->word);
            }
            return true;
        }

        // tional:   replace by tion
        if ( ($position = $this->search(['tional'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(tional)$#u', 'tion', $this->word);
            }
            return true;
        }

        // alism   aliti   alli:   replace by al
        if ( ($position = $this->search(['alism', 'aliti', 'alli'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(alism|aliti|alli)$#u', 'al', $this->word);
            }
            return true;
        }

        // enci:   replace by ence
        if ( ($position = $this->search(['enci'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(enci)$#u', 'ence', $this->word);
            }
            return true;
        }

        // anci:   replace by ance
        if ( ($position = $this->search(['anci'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(anci)$#u', 'ance', $this->word);
            }
            return true;
        }

        // abli:   replace by able
        if ( ($position = $this->search(['abli'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(abli)$#u', 'able', $this->word);
            }
            return true;
        }

        // entli:   replace by ent
        if ( ($position = $this->search(['entli'])) !== false) {
            if ($this->inR1($position)) {
                $this->word = preg_replace('#(entli)$#u', 'ent', $this->word);
            }
            return true;
        }

        // ogi+:   replace by og if preceded by l
        if ( ($position = $this->search(['ogi'])) !== false) {

            if ($this->inR1($position)) {
                $before = $position - 1;
                $letter = UTF8::substr($this->word, $before, 1);

                if ($letter == 'l') {
                    $this->word = preg_replace('#(ogi)$#u', 'og', $this->word);
                }
            }

            return true;
        }

        // li+:   delete if preceded by a valid li-ending
        if ( ($position = $this->search(['li'])) !== false) {

            if ($this->inR1($position)) {
                // a letter for you
                $letter = UTF8::substr($this->word, ($position-1), 1);

                if (in_array($letter, self::$liEnding)) {
                    $this->word = UTF8::substr($this->word, 0, $position);
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Step 3:
     * Search for the longest among the following suffixes, and, if found and in R1, perform the action indicated.
     */
    private function step3(): bool
    {
        // ational+:   replace by ate
        if ($this->searchIfInR1(['ational']) !== false) {
            $this->word = preg_replace('#(ational)$#u', 'ate', $this->word);
            return true;
        }

        // tional+:   replace by tion
        if ($this->searchIfInR1(['tional']) !== false) {
            $this->word = preg_replace('#(tional)$#u', 'tion', $this->word);
            return true;
        }

        // alize:   replace by al
        if ($this->searchIfInR1(['alize']) !== false) {
            $this->word = preg_replace('#(alize)$#u', 'al', $this->word);
            return true;
        }

        // icate   iciti   ical:   replace by ic
        if ($this->searchIfInR1(['icate', 'iciti', 'ical']) !== false) {
            $this->word = preg_replace('#(icate|iciti|ical)$#u', 'ic', $this->word);
            return true;
        }

        // ful   ness:   delete
        if ( ($position = $this->searchIfInR1(['ful', 'ness'])) !== false) {
            $this->word = UTF8::substr($this->word, 0, $position);
            return true;
        }

        // ative*:   delete if in R2
        if ( (($position = $this->searchIfInR1(['ative'])) !== false) && ($this->inR2($position)) )  {
            $this->word = UTF8::substr($this->word, 0, $position);
            return true;
        }

        return false;
    }

    /**
     * Step 4
     * Search for the longest among the following suffixes, and, if found and in R2, perform the action indicated.
     */
    private function step4(): bool
    {
        //    ement  ance   ence  able ible   ant  ment   ent   ism   ate   iti   ous   ive   ize al  er   ic
        //      delete
        if ( ($position = $this->search([
            'ance', 'ence', 'ement', 'able', 'ible', 'ant', 'ment', 'ent', 'ism',
            'ate', 'iti', 'ous', 'ive', 'ize', 'al', 'er', 'ic'])) !== false) {

            if ($this->inR2($position)) {
                $this->word = UTF8::substr($this->word, 0, $position);
            }
            return true;
        }

        // ion
        //      delete if preceded by s or t
        if ( ($position = $this->searchIfInR2(['ion'])) !== false) {
            $before = $position - 1;
            $letter = UTF8::substr($this->word, $before, 1);

            if ($letter == 's' || $letter == 't') {
                $this->word = UTF8::substr($this->word, 0, $position);
            }

            return true;
        }

        return false;
    }

    /**
     * Step 5: *
     * Search for the the following suffixes, and, if found, perform the action indicated.
     */
    private function step5(): bool
    {
        // e
        //      delete if in R2, or in R1 and not preceded by a short syllable
        if ( ($position = $this->search(['e'])) !== false) {
            if ($this->inR2($position)) {
                $this->word = UTF8::substr($this->word, 0, $position);

            } elseif ($this->inR1($position)) {
                if ( (! $this->searchShortSyllabe(-4, 3)) && (! $this->searchShortSyllabe(-3, 2)) ) {
                    $this->word = UTF8::substr($this->word, 0, $position);
                }
            }

            return true;
        }

        // l
        //      delete if in R2 and preceded by l
        if ( ($position = $this->searchIfInR2(['l'])) !== false) {
            $before = $position - 1;
            $letter = UTF8::substr($this->word, $before, 1);

            if ($letter == 'l') {
                $this->word = UTF8::substr($this->word, 0, $position);
            }

            return true;
        }

        return false;
    }

    private function finish(): void
    {
        $this->word = str_replace('Y', 'y', $this->word);
    }

    private function exceptionR1(): void
    {
        if (Utf8::strpos($this->word, 'gener') === 0) {
            $this->r1 = UTF8::substr($this->word, 5);
            $this->r1Index = 5;

        } elseif (Utf8::strpos($this->word, 'commun') === 0) {
            $this->r1 = UTF8::substr($this->word, 6);
            $this->r1Index = 6;

        } elseif (Utf8::strpos($this->word, 'arsen') === 0) {
            $this->r1 = UTF8::substr($this->word, 5);
            $this->r1Index = 5;
        }
    }

    /**
     *  1/ Stem certain special words as follows,
     *  2/ If one of the following is found, leave it invariant,
     */
    private function exception1(): ?string
    {
        $exceptions = [
            'skis'   => 'ski',
            'skies'  => 'sky',
            'dying'  => 'die',
            'lying'  => 'lie',
            'tying'  => 'tie',
            'idly'   => 'idl',
            'gently' => 'gentl',
            'ugly'   => 'ugli',
            'early'  => 'earli',
            'only'   => 'onli',
            'singly' => 'singl',
            // invariants
            'sky'    => 'sky',
            'news'   => 'news',
            'howe'   => 'howe',
            'atlas'  => 'atlas',
            'cosmos' => 'cosmos',
            'bias'   => 'bias',
            'andes'  => 'andes'
        ];

        return $exceptions[$this->word] ?? null;
    }

    /**
     * Following step 1a, leave the following invariant,
     */
    private function exception2(): ?string
    {
        $exceptions = [
            'inning' => 'inning',
            'outing' => 'outing',
            'canning' => 'canning',
            'herring' => 'herring',
            'earring' => 'earring',
            'proceed' => 'proceed',
            'exceed'  => 'exceed',
            'succeed' => 'succeed'
        ];

        return $exceptions[$this->word] ?? null;
    }

    /**
     *  A word is called short if it ends in a short syllable, and if R1 is null.
     *  Note : R1 not really null, but the word at this state must be smaller than r1 index
     */
    private function isShort(): bool
    {
        $length = UTF8::strlen($this->word);
        return ( ($this->searchShortSyllabe(-3, 3) || $this->searchShortSyllabe(-2, 2)) && ($length == $this->r1Index) );
    }

    /**
     * Define a short syllable in a word as either (a) a vowel followed by a non-vowel other than w, x or Y and preceded by a non-vowel,
     *  or * (b) a vowel at the beginning of the word followed by a non-vowel.
     *
     *  So rap, trap, entrap end with a short syllable, and ow, on, at are classed as short syllables.
     *  But uproot, bestow, disturb do not end with a short syllable.
     */
    private function searchShortSyllabe(int $from, int $nbLetters)
    {
        $length = UTF8::strlen($this->word);

        if ($from < 0) {
            $from = $length + $from;
        }
        if ($from < 0) {
            $from = 0;
        }

        // (a) is just for beginning of the word
        if ( ($nbLetters === 2) && ($from != 0) ) {
            return false;
        }

        $first = UTF8::substr($this->word, $from, 1);
        $second = UTF8::substr($this->word, ($from+1), 1);

        if ($nbLetters === 2 && (in_array($first, self::$vowels) && !in_array($second, self::$vowels))) {
            return true;
        }

        $third = UTF8::substr($this->word, ($from+2), 1);
        return (!in_array($first, self::$vowels)) && (in_array($second, self::$vowels))
            && (!in_array($third, array_merge(self::$vowels, ['x', 'Y', 'w'])));
    }
}
