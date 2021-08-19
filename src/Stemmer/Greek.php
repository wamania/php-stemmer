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

  define step1 as (
    [substring] among (
      'φαγια' 'φαγιου' 'φαγιων' (<- 'φα')
      'σκαγια' 'σκαγιου' 'σκαγιων' (<- 'σκα')
      'ολογιου' 'ολογια' 'ολογιων' (<- 'ολο')
      'σογιου' 'σογια' 'σογιων' (<- 'σο')
      'τατογια' 'τατογιου' 'τατογιων' (<- 'τατο')
      'κρεασ' 'κρεατοσ' 'κρεατα' 'κρεατων' (<- 'κρε')
      'περασ' 'περατοσ' 'περατη' 'περατα' 'περατων' (<- 'περ')
      'τερασ' 'τερατοσ' 'τερατα' 'τερατων' (<- 'τερ')
      'φωσ' 'φωτοσ' 'φωτα' 'φωτων' (<- 'φω')
      'καθεστωσ' 'καθεστωτοσ' 'καθεστωτα' 'καθεστωτων' (<- 'καθεστ')
      'γεγονοσ' 'γεγονοτοσ' 'γεγονοτα' 'γεγονοτων' (<- 'γεγον')
    )
    unset test1
  )

  define steps1 as (
    [substring] among (
      'ιζα' 'ιζεσ' 'ιζε' 'ιζαμε' 'ιζατε' 'ιζαν' 'ιζανε' 'ιζω' 'ιζεισ' 'ιζει'
      'ιζουμε' 'ιζετε' 'ιζουν' 'ιζουνε' (
        delete
        unset test1
        ([] substring atlimit among (
          'αναμπα' 'εμπα' 'επα' 'ξαναπα' 'πα' 'περιπα' 'αθρο' 'συναθρο' 'δανε'
          (<- 'ι')
        )) or
        ([] substring atlimit among (
          'μαρκ' 'κορν' 'αμπαρ' 'αρρ' 'βαθυρι' 'βαρκ' 'β' 'βολβορ' 'γκρ'
          'γλυκορ' 'γλυκυρ' 'ιμπ' 'λ' 'λου' 'μαρ' 'μ' 'πρ' 'μπρ' 'πολυρ' 'π'
          'ρ' 'πιπερορ'
          (<- 'ιζ')
        ))
      )
    )
  )

  define steps2 as (
    [substring] among (
      'ωθηκα' 'ωθηκεσ' 'ωθηκε' 'ωθηκαμε' 'ωθηκατε' 'ωθηκαν' 'ωθηκανε' (
        delete
        unset test1
        [] substring atlimit among (
          'αλ' 'βι' 'εν' 'υψ' 'λι' 'ζω' 'σ' 'χ' (<- 'ων')
        )
      )
    )
  )

  define steps3 as (
    [substring] among (
      'ισα' 'ισεσ' 'ισε' 'ισαμε' 'ισατε' 'ισαν' 'ισανε' (
        delete
        unset test1
        ('ισα' atlimit <- 'ισ') or
        ([] substring atlimit among (
          'αναμπα' 'αθρο' 'εμπα' 'εσε' 'εσωκλε' 'επα' 'ξαναπα' 'επε' 'περιπα'
          'συναθρο' 'δανε' 'κλε' 'χαρτοπα' 'εξαρχα' 'μετεπε' 'αποκλε'
          'απεκλε' 'εκλε' 'πε'
          (<- 'ι')
        )) or
        ([] substring atlimit among (
          'αν' 'αφ' 'γε' 'γιγαντοαφ' 'γκε' 'δημοκρατ' 'κομ' 'γκ' 'μ' 'π'
          'πουκαμ' 'ολο' 'λαρ'
          (<- 'ισ')
        ))
      )
    )
  )

  define steps4 as (
    [substring] among (
      'ισω' 'ισεισ' 'ισει' 'ισουμε' 'ισετε' 'ισουν' 'ισουνε' (
        delete
        unset test1
        [] substring atlimit among (
          'αναμπα' 'εμπα' 'εσε' 'εσωκλε' 'επα' 'ξαναπα' 'επε' 'περιπα' 'αθρο'
          'συναθρο' 'δανε' 'κλε' 'χαρτοπα' 'εξαρχα' 'μετεπε' 'αποκλε' 'απεκλε'
          'εκλε' 'πε'
          (<- 'ι')
        )
      )
    )
  )

  define steps5 as (
    [substring] among (
      'ιστοσ' 'ιστου' 'ιστο' 'ιστε' 'ιστοι' 'ιστων' 'ιστουσ' 'ιστη' 'ιστησ'
      'ιστα' 'ιστεσ' (
        delete
        unset test1
        ([] substring atlimit among (
          'δανε' 'συναθρο' 'κλε' 'σε' 'εσωκλε' 'ασε' 'πλε'
          (<- 'ι')
        )) or
        ([] substring atlimit among (
          'μ' 'π' 'απ' 'αρ' 'ηδ' 'κτ' 'σκ' 'σχ' 'υψ' 'φα' 'χρ' 'χτ' 'ακτ'
          'αορ' 'ασχ' 'ατα' 'αχν' 'αχτ' 'γεμ' 'γυρ' 'εμπ' 'ευπ' 'εχθ' 'ηφα'
          'καθ' 'κακ' 'κυλ' 'λυγ' 'μακ' 'μεγ' 'ταχ' 'φιλ' 'χωρ'
          (<- 'ιστ')
        ))
      )
    )
  )

  define steps6 as (
    [substring] among (
      'ισμο' 'ισμοι' 'ισμοσ' 'ισμου' 'ισμουσ' 'ισμων' (
        delete
        unset test1
        ([] substring atlimit among (
          'σε' 'μετασε' 'μικροσε' 'εγκλε' 'αποκλε'
          (<- 'ισμ')
        )) or
        ([] substring atlimit among (
          'δανε' 'αντιδανε'
          (<- 'ι')
        )) or
        ([substring] among (
          'αγνωστικ' (<- 'αγνωστ')
          'ατομικ' (<- 'ατομ')
          'γνωστικ' (<- 'γνωστ')
          'εθνικ' (<- 'εθν')
          'εκλεκτικ' (<- 'εκλεκτ')
          'σκεπτικ' (<- 'σκεπτ')
          'τοπικ' (<- 'τοπ')
          'αλεξανδριν' (<- 'αλεξανδρ')
          'βυζαντιν' (<- 'βυζαντ')
          'θεατριν' (<- 'θεατρ')
        ))
      )
    )
  )

  define steps7 as (
    [substring] among (
      'αρακι' 'αρακια' 'ουδακι' 'ουδακια' (
        delete
        unset test1
        [] substring atlimit among (
         'σ' 'χ'
         (<- 'αρακ')
        )
      )
    )
  )

  define steps8 as (
    [substring] among (
      'ακι' 'ακια' 'ιτσα' 'ιτσασ' 'ιτσεσ' 'ιτσων' 'αρακι' 'αρακια' (
        delete
        unset test1
        ([] substring atlimit among (
          'βαμβ' 'βρ' 'καιμ' 'κον' 'κορ' 'λαβρ' 'λουλ' 'μερ' 'μουστ'
          'ναγκασ' 'πλ' 'ρ' 'ρυ' 'σ' 'σκ' 'σοκ' 'σπαν' 'τζ' 'φαρμ' 'χ' 'καπακ'
          'αλισφ' 'αμβρ' 'ανθρ' 'κ' 'φυλ' 'κατραπ' 'κλιμ' 'μαλ' 'σλοβ' 'φ'
          'σφ' 'τσεχοσλοβ'
           (<- 'ακ')
        )) or
        ([] substring atlimit among (
          'β' 'βαλ' 'γιαν' 'γλ' 'ζ' 'ηγουμεν' 'καρδ' 'κον' 'μακρυν' 'νυφ'
          'πατερ' 'π' 'σκ' 'τοσ' 'τριπολ'
          (<- 'ιτσ')
        )) or
        ([] 'κορ' <- 'ιτσ')
      )
    )
  )

  define steps9 as (
    [substring] among (
      'ιδιο' 'ιδια' 'ιδιων' (
        delete
        unset test1
        ([] substring atlimit among (
          'αιφν' 'ιρ' 'ολο' 'ψαλ' (<- 'ιδ')
        )) or
        ([] substring among (
          'ε' 'παιχν' (<- 'ιδ')
        ))
      )
    )
  )

  define steps10 as (
    [substring] among (
      'ισκοσ' 'ισκου' 'ισκο' 'ισκε' (
        delete
        unset test1
        [] substring atlimit among (
         'δ' 'ιβ' 'μην' 'ρ' 'φραγκ' 'λυκ' 'οβελ'
         (<- 'ισκ')
        )
      )
    )
  )

  define step2a as (
    [substring] among (
      'αδεσ' 'αδων' (delete)
    )
    not ([substring] among (
      'οκ' 'μαμ' 'μαν' 'μπαμπ' 'πατερ' 'γιαγι' 'νταντ' 'κυρ' 'θει' 'πεθερ'
    ))
    insert 'αδ'
  )

  define step2b as (
    [substring] among (
      'εδεσ' 'εδων' (delete)
    )
    [] substring among (
      'οπ' 'ιπ' 'εμπ' 'υπ' 'γηπ' 'δαπ' 'κρασπ' 'μιλ' (<- 'εδ')
    )
  )

  define step2c as (
    [substring] among (
      'ουδεσ' 'ουδων' (delete)
    )
    [] substring among (
      'αρκ' 'καλιακ' 'πεταλ' 'λιχ' 'πλεξ' 'σκ' 'σ' 'φλ' 'φρ' 'βελ' 'λουλ' 'χν'
      'σπ' 'τραγ' 'φε' (<- 'ουδ')
    )
  )

  define step2d as (
    [substring] among (
      'εωσ' 'εων' (delete unset test1)
    )
    [] substring atlimit among (
      'θ' 'δ' 'ελ' 'γαλ' 'ν' 'π' 'ιδ' 'παρ' (<- 'ε')
    )
  )

  define step3 as (
    [substring] among (
      'ια' 'ιου' 'ιων' (delete unset test1)
    )
    ([] v <- 'ι')
  )

  define step4 as (
    [substring] among (
       'ικα' 'ικο' 'ικου' 'ικων' (delete unset test1)
    )
    ([] v <- 'ικ') or
    [] substring atlimit among (
      'αλ' 'αδ' 'ενδ' 'αμαν' 'αμμοχαλ' 'ηθ' 'ανηθ' 'αντιδ' 'φυσ' 'βρωμ' 'γερ'
      'εξωδ' 'καλπ' 'καλλιν' 'καταδ' 'μουλ' 'μπαν' 'μπαγιατ' 'μπολ' 'μποσ'
      'νιτ' 'ξικ' 'συνομηλ' 'πετσ' 'πιτσ' 'πικαντ' 'πλιατσ' 'ποστελν' 'πρωτοδ'
      'σερτ' 'συναδ' 'τσαμ' 'υποδ' 'φιλον' 'φυλοδ' 'χασ'
      (<- 'ικ')
    )
  )

  define step5a as (
    do ('αγαμε' atlimit <- 'αγαμ')
    do (
      [substring] among (
        'αγαμε' 'ησαμε' 'ουσαμε' 'ηκαμε' 'ηθηκαμε' (delete unset test1)
      )
    )
    ['αμε']
    delete
    unset test1
    [] substring atlimit among (
      'αναπ' 'αποθ' 'αποκ' 'αποστ' 'βουβ' 'ξεθ' 'ουλ' 'πεθ' 'πικρ' 'ποτ' 'σιχ' 'χ'
      (<- 'αμ')
    )
  )

  define step5b as (
    do (
      [substring] among (
        'αγανε' 'ησανε' 'ουσανε' 'ιοντανε' 'ιοτανε' 'ιουντανε' 'οντανε' 'οτανε'
        'ουντανε' 'ηκανε' 'ηθηκανε' (
          delete
          unset test1
          [] substring atlimit among (
            'τρ' 'τσ' (<- 'αγαν')
          )
        )
      )
    )
    ['ανε']
    delete
    unset test1
    ([] v2 <- 'αν') or
    [] substring atlimit among (
      'βετερ' 'βουλκ' 'βραχμ' 'γ' 'δραδουμ'
      'θ' 'καλπουζ' 'καστελ' 'κορμορ' 'λαοπλ' 'μωαμεθ'
      'μ' 'μουσουλμ' 'ν' 'ουλ' 'π' 'πελεκ' 'πλ' 'πολισ'
      'πορτολ' 'σαρακατσ' 'σουλτ' 'τσαρλατ' 'ορφ'
      'τσιγγ' 'τσοπ' 'φωτοστεφ' 'χ' 'ψυχοπλ' 'αγ'
      'γαλ' 'γερ' 'δεκ' 'διπλ' 'αμερικαν' 'ουρ' 'πιθ'
      'πουριτ' 'σ' 'ζωντ' 'ικ' 'καστ' 'κοπ' 'λιχ'
      'λουθηρ' 'μαιντ' 'μελ' 'σιγ' 'σπ' 'στεγ' 'τραγ'
      'τσαγ' 'φ' 'ερ' 'αδαπ' 'αθιγγ' 'αμηχ' 'ανικ'
      'ανοργ' 'απηγ' 'απιθ' 'ατσιγγ' 'βασ' 'βασκ'
      'βαθυγαλ' 'βιομηχ' 'βραχυκ' 'διατ' 'διαφ' 'ενοργ'
      'θυσ' 'καπνοβιομηχ' 'καταγαλ' 'κλιβ' 'κοιλαρφ'
      'λιβ' 'μεγλοβιομηχ' 'μικροβιομηχ' 'νταβ'
      'ξηροκλιβ' 'ολιγοδαμ' 'ολογαλ' 'πενταρφ' 'περηφ'
      'περιτρ' 'πλατ' 'πολυδαπ' 'πολυμηχ' 'στεφ' 'ταβ'
      'τετ' 'υπερηφ' 'υποκοπ' 'χαμηλοδαπ' 'ψηλοταβ'
      (<- 'αν')
    )
  )

  define step5c as (
    do (
      [substring] among (
        'ησετε' (delete unset test1)
      )
    )
    ['ετε']
    delete
    unset test1
    ([] v2 <- 'ετ') or
    ([] substring among (
      'οδ' 'αιρ' 'φορ' 'ταθ' 'διαθ' 'σχ' 'ενδ' 'ευρ' 'τιθ' 'υπερθ'
      'ραθ' 'ενθ' 'ροθ' 'σθ' 'πυρ' 'αιν' 'συνδ' 'συν' 'συνθ' 'χωρ'
      'πον' 'βρ' 'καθ' 'ευθ' 'εκθ' 'νετ' 'ρον' 'αρκ' 'βαρ' 'βολ' 'ωφελ'
      (<- 'ετ')
    )) or
    [] substring atlimit among (
      'αβαρ' 'βεν' 'εναρ' 'αβρ' 'αδ' 'αθ' 'αν' 'απλ' 'βαρον' 'ντρ' 'σκ' 'κοπ'
      'μπορ' 'νιφ' 'παγ' 'παρακαλ' 'σερπ' 'σκελ' 'συρφ' 'τοκ' 'υ' 'δ' 'εμ'
      'θαρρ' 'θ'
      (<- 'ετ')
    )
  )

  define step5d as (
    [substring] among (
      'οντασ' 'ωντασ' (
        delete
        unset test1
        ([] 'αρχ' atlimit <- 'οντ') or
        ([] 'κρε' <- 'ωντ')
      )
    )
  )

  define step5e as (
    [substring] among (
      'ομαστε' 'ιομαστε' (
        delete
        unset test1
        ([] 'ον' atlimit <- 'ομαστ')
      )
    )
  )

  define step5f as (
    do (
      ['ιεστε']
      delete
      unset test1
      [] substring atlimit among (
        'π' 'απ' 'συμπ' 'ασυμπ' 'ακαταπ' 'αμεταμφ' (<- 'ιεστ')
      )
    )
    ['εστε']
    delete
    unset test1
    [] substring atlimit among (
      'αλ' 'αρ' 'εκτελ' 'ζ' 'μ' 'ξ' 'παρακαλ' 'προ' 'νισ'
      (<- 'ιεστ')
    )
  )

  define step5g as (
    do (
      [substring] among (
        'ηθηκα' 'ηθηκεσ' 'ηθηκε' (delete unset test1)
      )
    )
    [substring] among (
      'ηκα' 'ηκεσ' 'ηκε' (
        delete
        unset test1
        ([] substring among (
           'σκωλ' 'σκουλ' 'ναρθ' 'σφ' 'οθ' 'πιθ' (<- 'ηκ')
        )) or
        ([] substring atlimit among (
           'διαθ' 'θ' 'παρακαταθ' 'προσθ' 'συνθ' (<- 'ηκ')
        ))
      )
    )
  )

  define step5h as (
    [substring] among (
      'ουσα' 'ουσεσ' 'ουσε' (
        delete
        unset test1
        ([] substring among (
          'ποδαρ' 'βλεπ' 'πανταχ' 'φρυδ' 'μαντιλ' 'μαλλ' 'κυματ' 'λαχ' 'ληγ'
          'φαγ' 'ομ' 'πρωτ' (<- 'ουσ')

        )) or
        ([] substring atlimit among (
          'φαρμακ' 'χαδ' 'αγκ' 'αναρρ' 'βρομ' 'εκλιπ' 'λαμπιδ' 'λεχ' 'μ' 'πατ'
          'ρ' 'λ' 'μεδ' 'μεσαζ' 'υποτειν' 'αμ' 'αιθ' 'ανηκ' 'δεσποζ'
          'ενδιαφερ' 'δε' 'δευτερευ' 'καθαρευ' 'πλε' 'τσα'
          (<- 'ουσ')
        ))
      )
    )
  )

  define step5i as (
    [substring] among (
      'αγα' 'αγεσ' 'αγε' (
        delete
        unset test1
        ([] 'κολλ' <- 'αγ') or (
          not ([substring] among ('ψοφ' 'ναυλοχ'))
          ([] substring among (
            'οφ' 'πελ' 'χορτ' 'λλ' 'σφ' 'ρπ' 'φρ' 'πρ' 'λοχ' 'σμην'
            (<- 'αγ')
          )) or
          ([] substring atlimit among (
            'αβαστ' 'πολυφ' 'αδηφ' 'παμφ' 'ρ' 'ασπ' 'αφ' 'αμαλ' 'αμαλλι'
            'ανυστ' 'απερ' 'ασπαρ' 'αχαρ' 'δερβεν' 'δροσοπ' 'ξεφ' 'νεοπ'
            'νομοτ' 'ολοπ' 'ομοτ' 'προστ' 'προσωποπ' 'συμπ' 'συντ' 'τ' 'υποτ'
            'χαρ' 'αειπ' 'αιμοστ' 'ανυπ' 'αποτ' 'αρτιπ' 'διατ' 'εν' 'επιτ'
            'κροκαλοπ' 'σιδηροπ' 'λ' 'ναυ' 'ουλαμ' 'ουρ' 'π' 'τρ' 'μ'
            (<- 'αγ')
          ))
        )
      )
    )
  )

  define step5j as (
    [substring] among (
      'ησε' 'ησου' 'ησα' (delete unset test1)
    )
    [] substring atlimit among (
      'ν' 'χερσον' 'δωδεκαν' 'ερημον' 'μεγαλον' 'επταν' (<- 'ησ')
    )
  )

  define step5k as (
    [substring] among (
      'ηστε' (delete unset test1)
    )
    [] substring atlimit among (
      'ασβ' 'σβ' 'αχρ' 'χρ' 'απλ' 'αειμν' 'δυσχρ' 'ευχρ' 'κοινοχρ' 'παλιμψ'
      (<- 'ηστ')
    )
  )

  define step5l as (
    [substring] among (
      'ουνε' 'ησουνε' 'ηθουνε' (delete unset test1)
    )
    [] substring atlimit among (
      'ν' 'ρ' 'σπι' 'στραβομουτσ' 'κακομουτσ' 'εξων' (<- 'ουν')
    )
  )

  define step5m as (
    [substring] among (
      'ουμε' 'ησουμε' 'ηθουμε' (delete unset test1)
    )
    [] substring atlimit among (
      'παρασουσ' 'φ' 'χ' 'ωριοπλ' 'αζ' 'αλλοσουσ' 'ασουσ'
      (<- 'ουμ')
    )
  )

  define step6 as (
    do (
      [substring] among (
        'ματα' 'ματων' 'ματοσ' (<- 'μα')
      )
    )
    test1
    [substring] among (
      'α' 'αγατε' 'αγαν' 'αει' 'αμαι' 'αν' 'ασ' 'ασαι' 'αται' 'αω' 'ε' 'ει'
      'εισ' 'ειτε' 'εσαι' 'εσ' 'εται' 'ι' 'ιεμαι' 'ιεμαστε' 'ιεται' 'ιεσαι'
      'ιεσαστε' 'ιομασταν' 'ιομουν' 'ιομουνα' 'ιονταν' 'ιοντουσαν' 'ιοσασταν'
      'ιοσαστε' 'ιοσουν' 'ιοσουνα' 'ιοταν' 'ιουμα' 'ιουμαστε' 'ιουνται'
      'ιουνταν' 'η' 'ηδεσ' 'ηδων' 'ηθει' 'ηθεισ' 'ηθειτε' 'ηθηκατε' 'ηθηκαν'
      'ηθουν' 'ηθω' 'ηκατε' 'ηκαν' 'ησ' 'ησαν' 'ησατε' 'ησει' 'ησεσ' 'ησουν'
      'ησω' 'ο' 'οι' 'ομαι' 'ομασταν' 'ομουν' 'ομουνα' 'ονται' 'ονταν'
      'οντουσαν' 'οσ' 'οσασταν' 'οσαστε' 'οσουν' 'οσουνα' 'οταν' 'ου' 'ουμαι'
      'ουμαστε' 'ουν' 'ουνται' 'ουνταν' 'ουσ' 'ουσαν' 'ουσατε' 'υ' 'υσ' 'ω'
      'ων' (delete)
    )
  )

  define step7 as (
    [substring] among (
      'εστερ' 'εστατ' 'οτερ' 'οτατ' 'υτερ' 'υτατ' 'ωτερ' 'ωτατ' (delete)
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
        $this->word = str_replace(array_keys($cleanup), array_values($cleanup), $this->word);

        if (UTF8::strlen($this->word) < 3) {
            return $this->word;
        }

        $this->step1();

        return $this->word;
    }

    /**
     * Step 1
     *
     * @return boolean True when something is done.
     */
    private function step1()
    {

    return true;
    }

        //  sti
        //  delete if in R2
        if (($position = $this->searchIfInR1(array('sti'))) !== false) {
            if ($this->inR2($position)) {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->r1();
                $this->r2();
            }

            return true;
        }
    }

    /**
     * Step 2: possessives.
     *
     * Search for the longest among the following suffixes in R1, and perform
     * the action indicated.
     *
     * @return boolean True when something is done.
     */
    private function step2()
    {
        // si
        //  delete if not preceded by k
        if (($position = $this->searchIfInR1(array('si'))) !== false) {
            $lastLetter = Utf8::substr($this->word, ($position-1), 1);

            if ($lastLetter !== 'k') {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // ni
        //  delete
        if (($position = $this->searchIfInR1(array('ni'))) !== false) {
            $this->word = Utf8::substr($this->word, 0, $position);
            // if preceded by kse, replace with ksi
            if ( ($position = $this->search(array('kse'))) !== false) {
                $this->word = preg_replace('#(kse)$#u', 'ksi', $this->word);
            }
            $this->r1();
            $this->r2();
            return true;
        }

        // nsa   nsä   mme   nne
        //  delete
        if (($position = $this->searchIfInR1(array('nsa', 'nsä', 'mme', 'nne'))) !== false) {
            $this->word = Utf8::substr($this->word, 0, $position);
            $this->r1();
            $this->r2();
            return true;
        }

        // an
        //  delete if preceded by one of   ta   ssa   sta   lla   lta   na
        if (($position = $this->searchIfInR1(array('an'))) !== false) {
            $word = Utf8::substr($this->word, 0, $position);
            $lastThreeLetters = Utf8::substr($word, -3, 3);
            $lastTwoLetters = Utf8::substr($word, -2, 2);
            if (in_array($lastThreeLetters, array('ssa', 'sta', 'lla', 'lta'), true) || in_array($lastTwoLetters, array('na', 'ta'), true)) {
                $this->word = $word;
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // än
        // delete if preceded by one of   tä   ssä   stä   llä   ltä   nä
        if (($position = $this->searchIfInR1(array('än'))) !== false) {
            $word = Utf8::substr($this->word, 0, $position);
            $lastThreeLetters = Utf8::substr($word, -3, 3);
            $lastTwoLetters = Utf8::substr($word, -2, 2);
            if (in_array($lastThreeLetters, array('ssä', 'stä', 'llä', 'ltä'), true) || in_array($lastTwoLetters, array('nä', 'tä'), true)) {
                $this->word = $word;
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // en
        // delete if preceded by one of   lle   ine
        if (($position = $this->searchIfInR1(array('en'))) !== false) {
            $word = Utf8::substr($this->word, 0, $position);
            if (Utf8::strlen($this->word) > 4) {
                $lastThreeLetters = Utf8::substr($this->word, -5, 3);
                if (in_array($lastThreeLetters, array('lle', 'ine'), true)) {
                    $this->word = $word;
                    $this->r1();
                    $this->r2();
                    return true;
                }
            }
        }
    }

    /**
     * Step 3: cases
     *
     * Search for the longest among the following suffixes in R1, and perform
     * the action indicated.
     *
     * @return boolean True when something is done.
     */
    private function step3()
    {
        // hXn
        // delete if preceded by X, where X is a V other than u (a/han, e/hen etc)
        foreach (self::$restrictedVowels as $vowel) {
            if ($vowel === 'u') {
                continue;
            }
            if (($position = $this->searchIfInR1(array('h' . $vowel . 'n'))) !== false) {
                $lastLetter = Utf8::substr($this->word, $position-1, 1);
                if ($lastLetter === $vowel) {
                    $this->word = Utf8::substr($this->word, 0, $position);
                    $this->_removedInStep3 = true;
                    $this->r1();
                    $this->r2();
                }
                return true;
            }
        }

        // siin   den   tten
        // delete if preceded by Vi
        if (($position = $this->searchIfInR1(array('siin', 'den', 'tten'))) !== false) {
            $lastLetter = Utf8::substr($this->word, ($position-1), 1);
            if ($lastLetter === 'i') {
                $nextLastLetter = Utf8::substr($this->word, ($position-2), 1);
                if (in_array($nextLastLetter, self::$restrictedVowels, true)) {
                    $this->word = Utf8::substr($this->word, 0, $position);
                    $this->_removedInStep3 = true;
                    $this->r1();
                    $this->r2();
                    return true;
                }
            }
        }

        // seen
        // delete if preceded by LV
        if (($position = $this->searchIfInR1(array('seen'))) !== false) {
            $lastLetters = Utf8::substr($this->word, ($position-2), 2);

            if (in_array($lastLetters, self::$longVowels, true)) {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->_removedInStep3 = true;
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // tta    ttä
        // delete if preceded by e
        if (($position = $this->searchIfInR1(array('tta', 'ttä'))) !== false) {
            $lastLetter = Utf8::substr($this->word, ($position-1), 1);

            if ($lastLetter === 'e') {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->_removedInStep3 = true;
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // ta  tä  ssa  ssä  sta  stä  lla  llä  lta  ltä  lle  na  nä  ksi  ine
        // delete
        if (($position = $this->searchIfInR1(array('ssa', 'ssä', 'sta', 'stä', 'lla', 'llä', 'lta', 'ltä', 'lle', 'ksi', 'na', 'nä', 'ine', 'ta', 'tä'))) !== false) {
            $this->word = Utf8::substr($this->word, 0, $position);
            $this->_removedInStep3 = true;
            $this->r1();
            $this->r2();
            return true;
        }

        // a    ä
        // delete if preceded by cv
        if (($position = $this->searchIfInR1(array('a', 'ä'))) !== false) {
            $lastLetter = Utf8::substr($this->word, ($position-1), 1);
            $nextLastLetter = Utf8::substr($this->word, ($position-2), 1);

            if (in_array($lastLetter, self::$vowels, true) && in_array($nextLastLetter, self::$consonants, true)) {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->_removedInStep3 = true;
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // n
        // delete, and if preceded by LV or ie, delete the last vowel
        if (($position = $this->searchIfInR1(array('n'))) !== false) {
            $lastLetters = Utf8::substr($this->word, ($position-2), 2);

            if (in_array($lastLetters, self::$longVowels, true) || $lastLetters === 'ie') {
                $this->word = Utf8::substr($this->word, 0, $position-1);
            } else {
                $this->word = Utf8::substr($this->word, 0, $position);
            }
            $this->r1();
            $this->r2();
            $this->_removedInStep3 = true;
            return true;
        }
    }

    /**
     * Step 4: other endings
     *
     * Search for the longest among the following suffixes in R2, and perform
     * the action indicated
     *
     * @return boolean True when something is done.
     */
    private function step4()
    {
        // mpi   mpa   mpä   mmi   mma   mmä
        // delete if not preceded by po
        if (($position = $this->searchIfInR2(array('mpi', 'mpa', 'mpä', 'mmi', 'mma', 'mmä'))) !== false) {
            $lastLetters = Utf8::substr($this->word, ($position-2), 2);
            if ($lastLetters !== 'po') {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->r1();
                $this->r2();
                return true;
            }
        }

        // impi   impa   impä   immi   imma   immä   eja   ejä
        // delete
        if (($position = $this->searchIfInR2(array('impi', 'impa', 'impä', 'immi', 'imma', 'immä', 'eja', 'ejä'))) !== false) {
            $this->word = Utf8::substr($this->word, 0, $position);
            $this->r1();
            $this->r2();
            return true;
        }
    }

    /**
     * Step 5: plurals
     * If an ending was removed in step 3, delete a final i or j if in R1;
     * otherwise,
     * if an ending was not removed in step 3, delete a final t in R1 if it
     * follows a vowel, and, if a t is removed, delete a final mma or imma in
     * R2, unless the mma is preceded by po.
     *
     * @return boolean True when something is done.
     */
    private function step5()
    {
        if ($this->_removedInStep3) {
            if (($position = $this->searchIfInR1(array('i', 'j'))) !== false) {
                $this->word = Utf8::substr($this->word, 0, $position);
                $this->r1();
                $this->r2();
                return true;
            }
        } else {
            if (($position = $this->searchIfInR1(array('t'))) !== false) {
                $lastLetter = Utf8::substr($this->word, ($position-1), 1);
                if (in_array($lastLetter, self::$vowels, true)) {
                    $this->word = Utf8::substr($this->word, 0, $position);
                    $this->r1();
                    $this->r2();
                    if (($position2 = $this->searchIfInR2(array('imma'))) !== false) {
                        $this->word = Utf8::substr($this->word, 0, $position2);
                        $this->r1();
                        $this->r2();
                        return true;
                    } elseif (($position2 = $this->searchIfInR2(array('mma'))) !== false) {
                        $lastLetters = Utf8::substr($this->word, ($position2-2), 2);
                        if ($lastLetters !== 'po') {
                            $this->word = Utf8::substr($this->word, 0, $position2);
                            $this->r1();
                            $this->r2();
                            return true;
                        }
                    }
                }
            }
        }

    }

    /**
     * Step 6: tidying up
     *
     * Do in turn steps (a), (b), (c), (d), restricting all tests to the
     * region R1.
     */
    private function step6()
    {
        // a) If R1 ends LV
        // delete the last letter
        if (($position = $this->searchIfInR1(self::$longVowels)) !== false) {
            $this->word = Utf8::substr($this->word, 0, $position+1);
            $this->r1();
            $this->r2();
        }

        // b) If R1 ends cX, c a consonant and X one of   a   ä   e   i,
        // delete the last letter
        $lastLetter = Utf8::substr($this->r1, -1, 1);
        $secondToLastLetter = Utf8::substr($this->r1, -2, 1);
        if (in_array($secondToLastLetter, self::$consonants, true) && in_array($lastLetter, array('a', 'e', 'i', 'ä'))) {
            $this->word = Utf8::substr($this->word, 0, -1);
            $this->r1();
            $this->r2();
        }

        // c) If R1 ends oj or uj
        // delete the last letter
        $twoLastLetters = Utf8::substr($this->r1, -2, 2);
        if (in_array($twoLastLetters, array('oj', 'uj'))) {
            $this->word = Utf8::substr($this->word, 0, -1);
            $this->r1();
            $this->r2();
        }

        // d) If R1 ends jo
        // delete the last letter
        $twoLastLetters = Utf8::substr($this->r1, -2, 2);
        if ($twoLastLetters === 'jo') {
            $this->word = Utf8::substr($this->word, 0, -1);
            $this->r1();
            $this->r2();
        }

        // e) If the word ends with a double consonant followed by zero or more
        // vowels, remove the last consonant (so eläkk -> eläk,
        // aatonaatto -> aatonaato)
        $endVowels = '';
        for ($i = Utf8::strlen($this->word) - 1; $i > 0; $i--) {
            $letter = Utf8::substr($this->word, $i, 1);
            if (in_array($letter, self::$vowels, true)) {
                $endVowels = $letter . $endVowels;
            } else {
                // check for double consonant
                $prevLetter = Utf8::substr($this->word, $i-1, 1);
                if ($prevLetter === $letter) {
                    $this->word = Utf8::substr($this->word, 0, $i) . $endVowels;
                }
                break;
            }
        }
    }
}
