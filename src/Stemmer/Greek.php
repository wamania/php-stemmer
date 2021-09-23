<?php
/**
 * Greek Snowball Stemmer.
 *
 * @author msaari <mikko@mikkosaari.fi>
 */
namespace Wamania\Snowball\Stemmer;

use voku\helper\UTF8;

/**
 * Greek Snowball Stemmer.
 *
 * @author msaari <mikko@mikkosaari.fi>
 * @link   https://snowballstem.org/algorithms/greek/stemmer.html
 */
class Greek extends Stem
{

/**
 *
 * // A stemmer for Modern Greek language, based on:
//
// Ntais, Georgios. Development of a Stemmer for the Greek
// Language. Diss. Royal Institute of Technology, 2006.
// https://sais.se/mthprize/2007/ntais2007.pdf
//
// Saroukos, Spyridon. Enhancing a Greek language stemmer.
// University of Tampere, 2008.
// https://tampub.uta.fi/bitstream/handle/10024/80480/gradu03463.pdf

stringescapes {}

stringdef a    '{U+03B1}' // alpha
stringdef v    '{U+03B2}' // beta
stringdef g    '{U+03B3}' // gamma
stringdef d    '{U+03B4}' // delta
stringdef e    '{U+03B5}' // epsilon
stringdef z    '{U+03B6}' // zeta
stringdef i    '{U+03B7}' // eta
stringdef th   '{U+03B8}' // theta
stringdef y    '{U+03B9}' // iota
stringdef k    '{U+03BA}' // kappa
stringdef l    '{U+03BB}' // lamda
stringdef m    '{U+03BC}' // mu
stringdef n    '{U+03BD}' // nu
stringdef x    '{U+03BE}' // xi
stringdef o    '{U+03BF}' // omicron
stringdef p    '{U+03C0}' // pi
stringdef r    '{U+03C1}' // rho
stringdef ss   '{U+03C2}' // sigma final
stringdef s    '{U+03C3}' // sigma
stringdef t    '{U+03C4}' // tau
stringdef u    '{U+03C5}' // upsilon
stringdef f    '{U+03C6}' // phi
stringdef ch   '{U+03C7}' // chi
stringdef ps   '{U+03C8}' // psi
stringdef oo   '{U+03C9}' // omega

stringdef A    '{U+0391}' // Alpha
stringdef V    '{U+0392}' // Beta
stringdef G    '{U+0393}' // Gamma
stringdef D    '{U+0394}' // Delta
stringdef E    '{U+0395}' // Epsilon
stringdef Z    '{U+0396}' // Zeta
stringdef I    '{U+0397}' // Eta
stringdef Th   '{U+0398}' // Theta
stringdef Y    '{U+0399}' // Iota
stringdef K    '{U+039A}' // Kappa
stringdef L    '{U+039B}' // Lamda
stringdef M    '{U+039C}' // Mu
stringdef N    '{U+039D}' // Nu
stringdef X    '{U+039E}' // Xi
stringdef O    '{U+039F}' // Omicron
stringdef P    '{U+03A0}' // Pi
stringdef R    '{U+03A1}' // Rho
stringdef S    '{U+03A3}' // Sigma
stringdef T    '{U+03A4}' // Tau
stringdef U    '{U+03A5}' // Upsilon
stringdef F    '{U+03A6}' // Phi
stringdef Ch   '{U+03A7}' // Chi
stringdef Ps   '{U+03A8}' // Psi
stringdef Oo   '{U+03A9}' // Omega

stringdef Y:   '{U+03AA}' // Iota with dialytika
stringdef U:   '{U+03AB}' // Upsilon with dialytika

stringdef a'   '{U+03AC}' // alpha with tonos
stringdef e'   '{U+03AD}' // epsilon with tonos
stringdef i'   '{U+03AE}' // eta with tonos
stringdef y'   '{U+03AF}' // iota with tonos
stringdef o'   '{U+03CC}' // omicron with tonos
stringdef u'   '{U+03CD}' // upsilon with tonos
stringdef oo'  '{U+03CE}' // omega with tonos

stringdef i:'  '{U+0390}' // iota with dialytika and tonos
stringdef u:'  '{U+03B0}' // upsilon with dialytika and tonos

stringdef i:   '{U+03CA}' // iota with dialytika
stringdef u:   '{U+03CB}' // upsilon with dialytika

stringdef A'   '{U+0386}' // Alpha with tonos
stringdef E'   '{U+0388}' // Epsilon with tonos
stringdef I'   '{U+0389}' // Eta with tonos
stringdef Y'   '{U+038A}' // Iota with tonos
stringdef O'   '{U+038C}' // Omicron with tonos
stringdef U'   '{U+038E}' // Upsilon with tonos
stringdef OO'  '{U+038F}' // Omega with tonos

externals ( stem )

booleans ( test1 )

groupings ( v v2 )

routines ( tolower has_min_length
           steps1 steps2 steps3 steps4 steps5 steps6 steps7
           steps8 steps9 steps10
           step1 step2a step2b step2c step2d step3 step4
           step5a step5b step5c step5d step5e step5f
           step5g step5h step5i
           step5j step5k step5l step5m
           step6 step7 )

define v 'αεηιουω'
define v2 'αεηιοω'

backwardmode (
  define has_min_length as (
    $(len >= 3)
  )

  define tolower as (
    repeat (
      [substring] among (
        'α' (<- 'α')
        '{V}' (<- 'β')
        'γ' (<- 'γ')
        '{D}' (<- 'δ')
        '{E}' (<- 'ε')
        '{Z}' (<- 'ζ')
        '{I}' (<- 'η')
        '{Th}' (<- 'θ')
        'ι' (<- 'ι')
        'κ' (<- 'κ')
        'λ' (<- 'λ')
        '{M}' (<- 'μ')
        'ν' (<- 'ν')
        '{X}' (<- 'ξ')
        'ο' (<- 'ο')
        '{P}' (<- 'π')
        'ρ' (<- 'ρ')
        'σ' (<- 'σ')
        'τ' (<- 'τ')
        'υ' (<- 'υ')
        'φ' (<- 'φ')
        '{Ch}' (<- 'χ')
        '{Ps}' (<- 'ψ')
        'ω' (<- 'ω')
        '{Y:}' (<- 'ι')
        '{U:}' (<- 'υ')
        '{a'}' (<- 'α')
        '{e'}' (<- 'ε')
        '{i'}' (<- 'η')
        '{y'}' (<- 'ι')
        '{o'}' (<- 'ο')
        '{u'}' (<- 'υ')
        '{oo'}' (<- 'ω')
        '{i:'}' (<- 'η')
        '{u:'}' (<- 'υ')
        '{i:}' (<- 'η')
        '{u:}' (<- 'υ')
        '{A'}' (<- 'α')
        '{E'}' (<- 'ε')
        '{I'}' (<- 'η')
        '{Y'}' (<- 'ι')
        '{O'}' (<- 'ο')
        '{U'}' (<- 'υ')
        '{OO'}' (<- 'ω')
        '{ss}' (<- 'σ')
         '' (next)
      )
    )
  )
)

define stem as (
    backwards (
      do tolower
      has_min_length
      set test1
      do step1
      do steps1
      do steps2
      do steps3
      do steps4
      do steps5
      do steps6
      do steps7
      do steps8
      do steps9
      do steps10
      do step2a
      do step2b
      do step2c
      do step2d
      do step3
      do step4
      do step5a
      do step5b
      do step5c
      do step5d
      do step5e
      do step5f
      do step5g
      do step5h
      do step5j
      do step5i
      do step5k
      do step5l
      do step5m
      do step6
      do step7
    )
   )

        a   α   Α
        v   β   Β
        g   γ   Γ
        d   δ   Δ
        e   ε   Ε
        z   ζ   Ζ
        i   η   Η
        th  θ   Θ
        y   ι   ι
        k   κ   Κ
        l   λ   Λ
        m   μ   Μ
        n   ν   Ν
        x   ξ   Ξ
        o   ο   Ο
        p   π   Π
        r   ρ   Ρ
        ss  ς
        s   σ   Σ
        t   τ   Τ
        u   υ   Υ
        f   φ   Φ
        ch  χ   Χ
        ps  ψ   Ψ
        oo  ω   Ω

        Y:  Ϊ
        U:  Ϋ

        a'  ά
        e'  έ
        i'  ή
        y'  ί
        o'  ό
        u'  ύ
        oo' ώ

        i:' ΐ
        u:' ΰ

        i:  ϊ
        u:  ϋ

        A'  Ά
        E'  Έ
        I'  Ή
        Y'  Ί
        O'  Ό
        U'  Ύ
        OO' Ώ

 */



    protected static $vowels1 = array('α', 'ε', 'η', 'ι', 'ο', 'υ', 'ω');
    protected static $vowels2 = array('α', 'ε', 'η', 'ι', 'ο', 'ω');
    protected static $cleanup = array(
        'ά' => 'α',
        'έ' => 'ε',
        'ή' => 'η',
        'ί' => 'ι',
        'ό' => 'ο',
        'ύ' => 'υ',
        'ώ' => 'ω',
        'Ά' => 'α',
        'Έ' => 'ε',
        'Ή' => 'η',
        'Ί' => 'ι',
        'Ό' => 'ο',
        'Ύ' => 'υ',
        'Ώ' => 'ω',
        'ς' => 'σ',
        'ΐ' => 'ι',
        'ϊ' => 'ι',
        'ΰ' => 'υ',
        'ϋ' => 'υ',
    );

    private $_test1 = true;

    /**
     * {@inheritdoc}
     */
    public function stem($word)
    {
        // we do ALL in UTF-8
        if (! UTF8::is_utf8($word)) {
            throw new \Exception('Word must be in UTF-8');
        }

        $this->word = Utf8::strtolower($word);
        $this->word = str_replace(
            array_keys($this::$cleanup), array_values($this::$cleanup),
            $this->word
        );

        if (UTF8::strlen($this->word) < 3) {
            return $this->word;
        }

        $this->_test1 = true;

        $this->step1();
        var_dump($this->word);
        $this->steps1();
        var_dump($this->word);
        $this->steps2();
        var_dump($this->word);
        $this->steps3();
        var_dump($this->word);
        $this->steps4();
        var_dump($this->word);
        $this->steps5();
        var_dump($this->word);
        $this->steps6();
        var_dump($this->word);
        $this->steps7();
        var_dump($this->word);
        $this->steps8();
        var_dump($this->word);
        $this->steps9();
        var_dump($this->word);
        $this->steps10();
        var_dump($this->word);
        $this->step2a();
        var_dump($this->word);
        $this->step2b();
        var_dump($this->word);
        $this->step2c();
        var_dump($this->word);
        $this->step2d();
        var_dump($this->word);
        $this->step3();
        var_dump($this->word);
        $this->step4();
        var_dump($this->word);
        $this->step5a();
        var_dump($this->word);
        $this->step5b();
        var_dump($this->word);
        $this->step5c();
        var_dump($this->word);
        $this->step5d();
        var_dump($this->word);
        $this->step5e();
        var_dump($this->word);
        $this->step5f();
        var_dump($this->word);
        $this->step5g();
        var_dump($this->word);
        $this->step5h();
        var_dump($this->word);
        $this->step5i();
        var_dump($this->word);
        $this->step5j();
        var_dump($this->word);
        $this->step5k();
        var_dump($this->word);
        $this->step5l();
        var_dump($this->word);
        $this->step5m();
        var_dump($this->word);
        $this->step6();
        var_dump($this->word);
        $this->step7();
        var_dump($this->word);

        return $this->word;
    }

    private function replaceFirstAtEnd($replacements)
    {
        foreach ($replacements as $replacement => $keys) {
            $position = $this->search($keys);
            if ($position) {
                $this->word = UTF8::substr_replace(
                    $this->word,
                    $replacement,
                    $position
                );
                return true;
            }
        }
        return true;
    }

    private function deleteSuffixIfExists($suffixes)
    {
        $position = $this->search($suffixes);
        if ($position) {
            $this->word = UTF8::substr_replace(
                $this->word,
                '',
                $position
            );
            return true;
        }
        return false;
    }

    private function replaceSuffixIfExists($suffixes, $replacement)
    {
        $position = $this->search($suffixes);
        if ($position) {
            $this->word = UTF8::substr_replace(
                $this->word,
                $replacement,
                $position
            );
            return true;
        }
        return false;
    }

    /**
     * Step 1
     *
     * @return boolean True when something is done.
     */
    private function step1()
    {
        $replacements = array(
            'φα' => array('φαγια', 'φαγιου', 'φαγιων'),
            'σκα' => array('σκαγια', 'σκαγιου', 'σκαγιων'),
            'ολο'=> array('ολογιου', 'ολογια', 'ολογιων'),
            'σο'=> array('σογιου', 'σογια', 'σογιων'),
            'τατο'=> array('τατογια', 'τατογιου', 'τατογιων'),
            'κρε'=> array('κρεασ', 'κρεατοσ', 'κρεατα', 'κρεατων'),
            'περ'=> array('περασ', 'περατοσ', 'περατη', 'περατα', 'περατων'),
            'τερ'=> array('τερασ', 'τερατοσ', 'τερατα', 'τερατων'),
            'φω'=> array('φωσ', 'φωτοσ', 'φωτα', 'φωτων'),
            'καθεστ'=> array('καθεστωσ', 'καθεστωτοσ', 'καθεστωτα', 'καθεστωτων'),
            'γεγον'=> array('γεγονοσ', 'γεγονοτοσ', 'γεγονοτα', 'γεγονοτων'),
        );
        $this->replaceFirstAtEnd($replacements);
        $this->_test1 = false;
        return true;
    }

    private function steps1()
    {
        $substrings = array(
            'ιζα', 'ιζεσ', 'ιζε', 'ιζαμε', 'ιζατε', 'ιζαν', 'ιζανε', 'ιζω', 'ιζεισ',
            'ιζει', 'ιζουμε', 'ιζετε', 'ιζουν', 'ιζουνε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'αναμπα', 'εμπα', 'επα', 'ξαναπα', 'πα', 'περιπα', 'αθρο', 'συναθρο',
                'δανε'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ι')) {
                return true;
            }
            $substrings = array(
                'μαρκ', 'κορν', 'αμπαρ', 'αρρ', 'βαθυρι', 'βαρκ', 'β', 'βολβορ',
                'γκρ', 'γλυκορ', 'γλυκυρ', 'ιμπ', 'λ', 'λου', 'μαρ', 'μ', 'πρ',
                'μπρ', 'πολυρ', 'π', 'ρ', 'πιπερορ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ιζ')) {
                return true;
            }
        }
        return true;
    }

    private function steps2()
    {
        $substrings = array(
            'ωθηκα', 'ωθηκεσ', 'ωθηκε', 'ωθηκαμε', 'ωθηκατε', 'ωθηκαν', 'ωθηκανε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'αλ', 'βι', 'εν', 'υψ', 'λι', 'ζω', 'σ', 'χ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ων')) {
                return true;
            }
        }
    }

    private function steps3()
    {
        $substrings = array(
            'ισα', 'ισεσ', 'ισε', 'ισαμε', 'ισατε', 'ισαν', 'ισανε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array('ισα');
            if ($this->replaceSuffixIfExists($substrings, 'ισ')) {
                return true;
            }
            $substrings = array(
                'αναμπα', 'αθρο', 'εμπα', 'εσε', 'εσωκλε', 'επα', 'ξαναπα', 'επε',
                'περιπα', 'συναθρο', 'δανε', 'κλε', 'χαρτοπα', 'εξαρχα', 'μετεπε',
                'αποκλε', 'απεκλε', 'εκλε', 'πε'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ι')) {
                return true;
            }
            $substrings = array(
                'αν', 'αφ', 'γε', 'γιγαντοαφ', 'γκε', 'δημοκρατ', 'κομ', 'γκ', 'μ',
                'π', 'πουκαμ', 'ολο', 'λαρ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ισ')) {
                return true;
            }
        }
    }

    private function steps4()
    {
        $substrings = array(
            'ισω', 'ισεισ', 'ισει', 'ισουμε', 'ισετε', 'ισουν', 'ισουνε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'αναμπα', 'εμπα', 'εσε', 'εσωκλε', 'επα', 'ξαναπα', 'επε', 'περιπα',
                'αθρο', 'συναθρο', 'δανε', 'κλε', 'χαρτοπα', 'εξαρχα', 'μετεπε',
                'αποκλε', 'απεκλε', 'εκλε', 'πε'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ι')) {
                return true;
            }
        }
    }

    private function steps5()
    {
        $substrings = array(
            'ιστοσ', 'ιστου', 'ιστο', 'ιστε', 'ιστοι', 'ιστων', 'ιστουσ', 'ιστη',
            'ιστησ', 'ιστα', 'ιστεσ'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'δανε', 'συναθρο', 'κλε', 'σε', 'εσωκλε', 'ασε', 'πλε'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ι')) {
                return true;
            }
            $substrings = array(
                'μ', 'π', 'απ', 'αρ', 'ηδ', 'κτ', 'σκ', 'σχ', 'υψ', 'φα', 'χρ', 'χτ',
                'ακτ', 'αορ', 'ασχ', 'ατα', 'αχν', 'αχτ', 'γεμ', 'γυρ', 'εμπ', 'ευπ',
                'εχθ', 'ηφα', 'καθ', 'κακ', 'κυλ', 'λυγ', 'μακ', 'μεγ', 'ταχ', 'φιλ',
                'χωρ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ιστ')) {
                return true;
            }
        }
    }

    private function steps6()
    {
        $substrings = array(
            'ισμο', 'ισμοι', 'ισμοσ', 'ισμου', 'ισμουσ', 'ισμων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'σε', 'μετασε', 'μικροσε', 'εγκλε', 'αποκλε'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ισμ')) {
                return true;
            }
            $substrings = array('δανε', 'αντιδανε');
            if ($this->replaceSuffixIfExists($substrings, 'ι')) {
                return true;
            }
            $this->replaceSuffixIfExists(array('αγνωστικ'), 'αγνωστ');
            $this->replaceSuffixIfExists(array('ατομικ'), 'ατομ');
            $this->replaceSuffixIfExists(array('γνωστικ'), 'γνωστ');
            $this->replaceSuffixIfExists(array('εθνικ'), 'εθν');
            $this->replaceSuffixIfExists(array('εκλεκτικ'), 'εκλεκτ');
            $this->replaceSuffixIfExists(array('σκεπτικ'), 'σκεπτ');
            $this->replaceSuffixIfExists(array('τοπικ'), 'τοπ');
            $this->replaceSuffixIfExists(array('αλεξανδριν'), 'αλεξανδρ');
            $this->replaceSuffixIfExists(array('βυζαντιν'), 'βυζαντ');
            $this->replaceSuffixIfExists(array('θεατριν'), 'θεατρ');
        }
    }

    private function steps7()
    {
        $substrings = array(
            'αρακι', 'αρακια', 'ουδακι', 'ουδακια'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'σ', 'χ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'αρακ')) {
                return true;
            }
        }
    }

    private function steps8()
    {
        $substrings = array(
            'ακι', 'ακια', 'ιτσα', 'ιτσασ', 'ιτσεσ', 'ιτσων', 'αρακι', 'αρακια'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'βαμβ', 'βρ', 'καιμ', 'κον', 'κορ', 'λαβρ', 'λουλ', 'μερ', 'μουστ',
                'ναγκασ', 'πλ', 'ρ', 'ρυ', 'σ', 'σκ', 'σοκ', 'σπαν', 'τζ', 'φαρμ',
                'χ', 'καπακ', 'αλισφ', 'αμβρ', 'ανθρ', 'κ', 'φυλ', 'κατραπ', 'κλιμ',
                'μαλ', 'σλοβ', 'φ', 'σφ', 'τσεχοσλοβ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ακ')) {
                return true;
            }
            $substrings = array(
                'β', 'βαλ', 'γιαν', 'γλ', 'ζ', 'ηγουμεν', 'καρδ', 'κον', 'μακρυν',
                'νυφ', 'πατερ', 'π', 'σκ', 'τοσ', 'τριπολ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ιτσ')) {
                return true;
            }
            if ($this->replaceSuffixIfExists(array('κορ'), 'ιτσ')) {
                return true;
            }
        }
    }

    private function steps9()
    {
        $substrings = array(
            'ιδιο', 'ιδια', 'ιδιων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'αιφν', 'ιρ', 'ολο', 'ψαλ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ιδ')) {
                return true;
            }
            $substrings = array(
                'ε', 'παιχν'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ιδ')) {
                return true;
            }
        }
    }

    private function steps10()
    {
        $substrings = array(
            'ισκοσ', 'ισκου', 'ισκο', 'ισκε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'δ', 'ιβ', 'μην', 'ρ', 'φραγκ', 'λυκ', 'οβελ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ισκ')) {
                return true;
            }
        }
    }

    private function step2a()
    {
        $substrings = array(
            'αδεσ', 'αδων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'οκ', 'μαμ', 'μαν', 'μπαμπ', 'πατερ', 'γιαγι', 'νταντ', 'κυρ', 'θει',
                'πεθερ'
            );
            if (!$this->search($substrings)) {
                $this->word .= 'αδ';
            }
        }
    }

    private function step2b()
    {
        $substrings = array(
            'εδεσ', 'εδων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'οπ', 'ιπ', 'εμπ', 'υπ', 'γηπ', 'δαπ', 'κρασπ', 'μιλ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'εδ')) {
                return true;
            }
        }
    }

    private function step2c()
    {
        $substrings = array(
            'ουδεσ', 'ουδων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'αρκ', 'καλιακ', 'πεταλ', 'λιχ', 'πλεξ', 'σκ', 'σ', 'φλ', 'φρ',
                'βελ', 'λουλ', 'χν', 'σπ', 'τραγ', 'φε'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ουδ')) {
                return true;
            }
        }
    }

    private function step2d()
    {
        $substrings = array(
            'εωσ', 'εων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'θ', 'δ', 'ελ', 'γαλ', 'ν', 'π', 'ιδ', 'παρ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ε')) {
                return true;
            }
        }
    }

    private function step3()
    {
        $substrings = array(
            'ια', 'ιου', 'ιων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            if ($this->replaceSuffixIfExists($this::$vowels1, 'ι')) {
                return true;
            }
        }
    }

    private function step4()
    {
        $substrings = array(
            'ικα', 'ικο', 'ικου', 'ικων'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            if ($this->replaceSuffixIfExists($this::$vowels1, 'ικ')) {
                return true;
            }
            $substrings = array(
                'αλ', 'αδ', 'ενδ', 'αμαν', 'αμμοχαλ', 'ηθ', 'ανηθ', 'αντιδ', 'φυσ',
                'βρωμ', 'γερ', 'εξωδ', 'καλπ', 'καλλιν', 'καταδ', 'μουλ', 'μπαν',
                'μπαγιατ', 'μπολ', 'μποσ', 'νιτ', 'ξικ', 'συνομηλ', 'πετσ', 'πιτσ',
                'πικαντ', 'πλιατσ', 'ποστελν', 'πρωτοδ', 'σερτ', 'συναδ', 'τσαμ',
                'υποδ', 'φιλον', 'φυλοδ', 'χασ'
            );
            if ($this->replaceSuffixIfExists($substrings, 'ικ')) {
                return true;
            }
        }
    }

    private function step5a()
    {
        $substrings = array(
            'αγαμε'
        );
        $this->replaceSuffixIfExists($substrings, 'αγαμ');
        $substrings = array(
            'αγαμε', 'ησαμε', 'ουσαμε', 'ηκαμε', 'ηθηκαμε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'αμε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'αναπ', 'αποθ', 'αποκ', 'αποστ', 'βουβ', 'ξεθ', 'ουλ', 'πεθ', 'πικρ',
            'ποτ', 'σιχ', 'χ'
        );
        $this->replaceSuffixIfExists($substrings, 'αμ');
    }

    private function step5b()
    {
        $substrings = array(
            'αγανε', 'ησανε', 'ουσανε', 'ιοντανε', 'ιοτανε', 'ιουντανε', 'οντανε',
            'οτανε', 'ουντανε', 'ηκανε', 'ηθηκανε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'τρ', 'τσ'
            );
            $this->replaceSuffixIfExists($substrings, 'αγαν');
        }
        $substrings = array(
            'ανε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        if (!$this->replaceSuffixIfExists($this::$vowels2, 'αν')) {
            $substrings = array(
                'βετερ', 'βουλκ', 'βραχμ', 'γ', 'δραδουμ', 'θ', 'καλπουζ', 'καστελ',
                'κορμορ', 'λαοπλ', 'μωαμεθ', 'μ', 'μουσουλμ', 'ν', 'ουλ', 'π',
                'πελεκ', 'πλ', 'πολισ', 'πορτολ', 'σαρακατσ', 'σουλτ', 'τσαρλατ',
                'ορφ', 'τσιγγ', 'τσοπ', 'φωτοστεφ', 'χ', 'ψυχοπλ', 'αγ', 'γαλ',
                'γερ', 'δεκ', 'διπλ', 'αμερικαν', 'ουρ', 'πιθ', 'πουριτ', 'σ',
                'ζωντ', 'ικ', 'καστ', 'κοπ', 'λιχ', 'λουθηρ', 'μαιντ', 'μελ', 'σιγ',
                'σπ', 'στεγ', 'τραγ', 'τσαγ', 'φ', 'ερ', 'αδαπ', 'αθιγγ', 'αμηχ',
                'ανικ', 'ανοργ', 'απηγ', 'απιθ', 'ατσιγγ', 'βασ', 'βασκ', 'βαθυγαλ',
                'βιομηχ', 'βραχυκ', 'διατ', 'διαφ', 'ενοργ', 'θυσ', 'καπνοβιομηχ',
                'καταγαλ', 'κλιβ', 'κοιλαρφ', 'λιβ', 'μεγλοβιομηχ', 'μικροβιομηχ',
                'νταβ', 'ξηροκλιβ', 'ολιγοδαμ', 'ολογαλ', 'πενταρφ', 'περηφ',
                'περιτρ', 'πλατ', 'πολυδαπ', 'πολυμηχ', 'στεφ', 'ταβ', 'τετ',
                'υπερηφ', 'υποκοπ', 'χαμηλοδαπ', 'ψηλοταβ'
            );
            $this->replaceSuffixIfExists($substrings, 'αν');
        }
    }

    private function step5c()
    {
        $substrings = array('ησετε');
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array('ετε');
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        if (!$this->replaceSuffixIfExists($this::$vowels2, 'ετ')) {
            $substrings = array(
                'οδ', 'αιρ', 'φορ', 'ταθ', 'διαθ', 'σχ', 'ενδ', 'ευρ', 'τιθ',
                'υπερθ', 'ραθ', 'ενθ', 'ροθ', 'σθ', 'πυρ', 'αιν', 'συνδ', 'συν',
                'συνθ', 'χωρ', 'πον', 'βρ', 'καθ', 'ευθ', 'εκθ', 'νετ', 'ρον',
                'αρκ', 'βαρ', 'βολ', 'ωφελ'
            );
            if (!$this->replaceSuffixIfExists($substrings, 'ετ')) {
                $substrings = array(
                    'αβαρ', 'βεν', 'εναρ', 'αβρ', 'αδ', 'αθ', 'αν', 'απλ', 'βαρον',
                    'ντρ', 'σκ', 'κοπ', 'μπορ', 'νιφ', 'παγ', 'παρακαλ', 'σερπ',
                    'σκελ', 'συρφ', 'τοκ', 'υ', 'δ', 'εμ', 'θαρρ', 'θ'
                );
                $this->replaceSuffixIfExists($substrings, 'ετ');
            }
        }
    }

    private function step5d()
    {
        $substrings = array(
            'οντασ', 'ωντασ'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array('αρχ');
            if (!$this->replaceSuffixIfExists($substrings, 'οντ')) {
                $substrings = array('κρε');
                $this->replaceSuffixIfExists($substrings, 'ωντ');
            }
        }
    }

    private function step5e()
    {
        $substrings = array(
            'ομαστε', 'ιομαστε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array('ον');
            $this->replaceSuffixIfExists($substrings, 'ομαστ');
        }
    }

    private function step5f()
    {
        $substrings = array('ιεστε');
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'π', 'απ', 'συμπ', 'ασυμπ', 'ακαταπ', 'αμεταμφ'
            );
            $this->replaceSuffixIfExists($substrings, 'ιεστ');
        }
        $substrings = array('εστε');
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'αλ', 'αρ', 'εκτελ', 'ζ', 'μ', 'ξ', 'παρακαλ', 'προ', 'νισ'
            );
            $this->replaceSuffixIfExists($substrings, 'ιεστ');
        }
    }

    private function step5g()
    {
        $substrings = array(
            'ηθηκα', 'ηθηκεσ', 'ηθηκε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'ηκα', 'ηκεσ', 'ηκε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'σκωλ', 'σκουλ', 'ναρθ', 'σφ', 'οθ', 'πιθ'
            );
            if (!$this->replaceSuffixIfExists($substrings, 'ηκ')) {
                $substrings = array(
                    'διαθ', 'θ', 'παρακαταθ', 'προσθ', 'συνθ'
                );
                $this->replaceSuffixIfExists($substrings, 'ηκ');
            }
        }
    }

    private function step5h()
    {
        $substrings = array(
            'ουσα', 'ουσεσ', 'ουσε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array(
                'ποδαρ', 'βλεπ', 'πανταχ', 'φρυδ', 'μαντιλ', 'μαλλ', 'κυματ', 'λαχ',
                'ληγ', 'φαγ', 'ομ', 'πρωτ'
            );
            if (!$this->replaceSuffixIfExists($substrings, 'ουσ')) {
                $substrings = array(
                    'φαρμακ', 'χαδ', 'αγκ', 'αναρρ', 'βρομ', 'εκλιπ', 'λαμπιδ',
                    'λεχ', 'μ', 'πατ', 'ρ', 'λ', 'μεδ', 'μεσαζ', 'υποτειν', 'αμ',
                    'αιθ', 'ανηκ', 'δεσποζ', 'ενδιαφερ', 'δε', 'δευτερευ',
                    'καθαρευ', 'πλε', 'τσα'
                );
                $this->replaceSuffixIfExists($substrings, 'ουσ');
            }
        }
    }

    private function step5i()
    {
        $substrings = array(
            'αγα', 'αγεσ', 'αγε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
            $substrings = array('κολλ');
            if (!$this->replaceSuffixIfExists($substrings, 'αγ')) {
                $substrings = array(
                    'ψοφ', 'ναυλοχ'
                );
                if (!$this->search($substrings)) {
                    $substrings = array(
                        'οφ', 'πελ', 'χορτ', 'λλ', 'σφ', 'ρπ', 'φρ', 'πρ', 'λοχ',
                        'σμην'
                    );
                    if (!$this->replaceSuffixIfExists($substrings, 'αγ')) {
                        $substrings = array(
                            'αβαστ', 'πολυφ', 'αδηφ', 'παμφ', 'ρ', 'ασπ', 'αφ',
                            'αμαλ', 'αμαλλι', 'ανυστ', 'απερ', 'ασπαρ', 'αχαρ',
                            'δερβεν', 'δροσοπ', 'ξεφ', 'νεοπ', 'νομοτ', 'ολοπ',
                            'ομοτ', 'προστ', 'προσωποπ', 'συμπ', 'συντ', 'τ',
                            'υποτ', 'χαρ', 'αειπ', 'αιμοστ', 'ανυπ', 'αποτ',
                            'αρτιπ', 'διατ', 'εν', 'επιτ', 'κροκαλοπ', 'σιδηροπ',
                            'λ', 'ναυ', 'ουλαμ', 'ουρ', 'π', 'τρ', 'μ'
                        );
                        $this->replaceSuffixIfExists($substrings, 'αγ');
                    }
                }
            }
        }
    }

    private function step5j()
    {
        $substrings = array(
            'ησε', 'ησου', 'ησα'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'ν', 'χερσον', 'δωδεκαν', 'ερημον', 'μεγαλον', 'επταν'
        );
        $this->replaceSuffixIfExists($substrings, 'ησ');
    }

    private function step5k()
    {
        $substrings = array('ηστε');
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'ασβ', 'σβ', 'αχρ', 'χρ', 'απλ', 'αειμν', 'δυσχρ', 'ευχρ', 'κοινοχρ',
            'παλιμψ'
        );
        $this->replaceSuffixIfExists($substrings, 'ηστ');
    }

    private function step5l()
    {
        $substrings = array(
            'ουνε', 'ησουνε', 'ηθουνε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'ν', 'ρ', 'σπι', 'στραβομουτσ', 'κακομουτσ', 'εξων'
        );
        $this->replaceSuffixIfExists($substrings, 'ουν');
    }

    private function step5m()
    {
        $substrings = array(
            'ουμε', 'ησουμε', 'ηθουμε'
        );
        if ($this->deleteSuffixIfExists($substrings)) {
            $this->_test1 = false;
        }
        $substrings = array(
            'παρασουσ', 'φ', 'χ', 'ωριοπλ', 'αζ', 'αλλοσουσ', 'ασουσ'
        );
        $this->replaceSuffixIfExists($substrings, 'ουμ');
    }

    private function step6()
    {
        $substrings = array(
            'ματα', 'ματων', 'ματοσ'
        );
        $this->replaceSuffixIfExists($substrings, 'μα');
        if ($this->_test1) {
            $substrings = array(
               'α', 'αγατε', 'αγαν', 'αει', 'αμαι', 'αν', 'ασ', 'ασαι', 'αται',
               'αω', 'ε', 'ει', 'εισ', 'ειτε', 'εσαι', 'εσ', 'εται', 'ι', 'ιεμαι',
               'ιεμαστε', 'ιεται', 'ιεσαι', 'ιεσαστε', 'ιομασταν', 'ιομουν',
               'ιομουνα', 'ιονταν', 'ιοντουσαν', 'ιοσασταν', 'ιοσαστε', 'ιοσουν',
               'ιοσουνα', 'ιοταν', 'ιουμα', 'ιουμαστε', 'ιουνται', 'ιουνταν', 'η',
               'ηδεσ', 'ηδων', 'ηθει', 'ηθεισ', 'ηθειτε', 'ηθηκατε', 'ηθηκαν',
               'ηθουν', 'ηθω', 'ηκατε', 'ηκαν', 'ησ', 'ησαν', 'ησατε', 'ησει',
               'ησεσ', 'ησουν', 'ησω', 'ο', 'οι', 'ομαι', 'ομασταν', 'ομουν',
               'ομουνα', 'ονται', 'ονταν', 'οντουσαν', 'οσ', 'οσασταν', 'οσαστε',
               'οσουν', 'οσουνα', 'οταν', 'ου', 'ουμαι', 'ουμαστε', 'ουν',
               'ουνται', 'ουνταν', 'ουσ', 'ουσαν', 'ουσατε', 'υ', 'υσ', 'ω', 'ων'
            );
            $this->deleteSuffixIfExists($substrings);
        }
    }

    private function step7()
    {
        $substrings = array(
            'εστερ', 'εστατ', 'οτερ', 'οτατ', 'υτερ', 'υτατ', 'ωτερ', 'ωτατ'
        );
        $this->deleteSuffixIfExists($substrings);
    }
}
