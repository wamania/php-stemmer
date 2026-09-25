<?php

namespace Wamania\Snowball;

/**
 * Class to transliterate strings
 *
 * Each mapping below is derived directly from the character's own Unicode
 * identity: for a letter with a canonical decomposition (e.g. U+00E0 LATIN
 * SMALL LETTER A WITH GRAVE), the target is that letter's base form (a).
 * For the handful of letters with no diacritic to strip (ß, þ, ð, æ, œ, ø,
 * ł, đ, ħ, ƒ, µ) and for the German umlauts/ß, the target follows the
 * standard, widely attested romanization convention for that letter
 * (e.g. DIN 5007 for ä/ö/ü/ß, ALA-LC for þ/ð, common English usage for
 * æ/œ), independently of any single third-party table. These conventions
 * match Unicode CLDR's own transform rules, the closest thing to a
 * canonical reference for this kind of mapping:
 * @see https://github.com/unicode-org/cldr/blob/main/common/transforms/Latin-ASCII.xml
 * @see https://github.com/unicode-org/cldr/blob/main/common/transforms/de-ASCII.xml
 */
class Transliterate
{
    /**
     * Returns strings transliterated from UTF-8 to Latin
     *
     * @param   string   $string  String to transliterate
     * @param   integer  $case    Optionally specify upper or lower case. Default to null.
     *
     * @return  string  Transliterated string
     */
    public static function utf8_latin_to_ascii($string, $case = 0)
    {
        static $UTF8_LOWER_ACCENTS = null;
        static $UTF8_UPPER_ACCENTS = null;

        if ($case <= 0) {
            if (\is_null($UTF8_LOWER_ACCENTS)) {
                $UTF8_LOWER_ACCENTS = [
                    'à' => 'a',
                    'á' => 'a',
                    'â' => 'a',
                    'ã' => 'a',
                    'ä' => 'ae',
                    'å' => 'a',
                    'ā' => 'a',
                    'ă' => 'a',
                    'ą' => 'a',
                    'æ' => 'ae',
                    'ḃ' => 'b',
                    'ç' => 'c',
                    'ć' => 'c',
                    'ĉ' => 'c',
                    'ċ' => 'c',
                    'č' => 'c',
                    'ď' => 'd',
                    'ḋ' => 'd',
                    'đ' => 'd',
                    'ð' => 'dh',
                    'è' => 'e',
                    'é' => 'e',
                    'ê' => 'e',
                    'ë' => 'e',
                    'ē' => 'e',
                    'ĕ' => 'e',
                    'ė' => 'e',
                    'ę' => 'e',
                    'ě' => 'e',
                    'ḟ' => 'f',
                    'ƒ' => 'f',
                    'ĝ' => 'g',
                    'ğ' => 'g',
                    'ġ' => 'g',
                    'ģ' => 'g',
                    'ĥ' => 'h',
                    'ħ' => 'h',
                    'ì' => 'i',
                    'í' => 'i',
                    'î' => 'i',
                    'ï' => 'i',
                    'ĩ' => 'i',
                    'ī' => 'i',
                    'į' => 'i',
                    'ĵ' => 'j',
                    'ķ' => 'k',
                    'ĺ' => 'l',
                    'ļ' => 'l',
                    'ľ' => 'l',
                    'ł' => 'l',
                    'ṁ' => 'm',
                    'ñ' => 'n',
                    'ń' => 'n',
                    'ņ' => 'n',
                    'ň' => 'n',
                    'ò' => 'o',
                    'ó' => 'o',
                    'ô' => 'o',
                    'õ' => 'o',
                    'ö' => 'oe',
                    'ø' => 'o',
                    'ō' => 'o',
                    'ő' => 'o',
                    'œ' => 'oe',
                    'ơ' => 'o',
                    'ṗ' => 'p',
                    'ŕ' => 'r',
                    'ř' => 'r',
                    'ŗ' => 'r',
                    'ś' => 's',
                    'ŝ' => 's',
                    'ş' => 's',
                    'š' => 's',
                    'ș' => 's',
                    'ß' => 'ss',
                    'ṡ' => 's',
                    'ť' => 't',
                    'ţ' => 't',
                    'ṫ' => 't',
                    'ŧ' => 't',
                    'ț' => 't',
                    'þ' => 'th',
                    'ù' => 'u',
                    'ú' => 'u',
                    'û' => 'u',
                    'ü' => 'ue',
                    'ũ' => 'u',
                    'ū' => 'u',
                    'ŭ' => 'u',
                    'ů' => 'u',
                    'ű' => 'u',
                    'ų' => 'u',
                    'ư' => 'u',
                    'ẁ' => 'w',
                    'ẃ' => 'w',
                    'ŵ' => 'w',
                    'ẅ' => 'w',
                    'ý' => 'y',
                    'ÿ' => 'y',
                    'ŷ' => 'y',
                    'ỳ' => 'y',
                    'ź' => 'z',
                    'ż' => 'z',
                    'ž' => 'z',
                    'µ' => 'u',
                ];
            }

            $string = str_replace(array_keys($UTF8_LOWER_ACCENTS), array_values($UTF8_LOWER_ACCENTS), $string);
        }

        if ($case >= 0) {
            if (\is_null($UTF8_UPPER_ACCENTS)) {
                $UTF8_UPPER_ACCENTS = [
                    'À' => 'A',
                    'Á' => 'A',
                    'Â' => 'A',
                    'Ã' => 'A',
                    'Ä' => 'Ae',
                    'Å' => 'A',
                    'Ā' => 'A',
                    'Ă' => 'A',
                    'Ą' => 'A',
                    'Æ' => 'Ae',
                    'Ḃ' => 'B',
                    'Ç' => 'C',
                    'Ć' => 'C',
                    'Ĉ' => 'C',
                    'Ċ' => 'C',
                    'Č' => 'C',
                    'Ď' => 'D',
                    'Ḋ' => 'D',
                    'Đ' => 'D',
                    'Ð' => 'Dh',
                    'È' => 'E',
                    'É' => 'E',
                    'Ê' => 'E',
                    'Ë' => 'E',
                    'Ē' => 'E',
                    'Ĕ' => 'E',
                    'Ė' => 'E',
                    'Ę' => 'E',
                    'Ě' => 'E',
                    'Ḟ' => 'F',
                    'Ƒ' => 'F',
                    'Ĝ' => 'G',
                    'Ğ' => 'G',
                    'Ġ' => 'G',
                    'Ģ' => 'G',
                    'Ĥ' => 'H',
                    'Ħ' => 'H',
                    'Ì' => 'I',
                    'Í' => 'I',
                    'Î' => 'I',
                    'Ï' => 'I',
                    'Ĩ' => 'I',
                    'Ī' => 'I',
                    'Į' => 'I',
                    'Ĵ' => 'J',
                    'Ķ' => 'K',
                    'Ĺ' => 'L',
                    'Ļ' => 'L',
                    'Ľ' => 'L',
                    'Ł' => 'L',
                    'Ṁ' => 'M',
                    'Ñ' => 'N',
                    'Ń' => 'N',
                    'Ņ' => 'N',
                    'Ň' => 'N',
                    'Ò' => 'O',
                    'Ó' => 'O',
                    'Ô' => 'O',
                    'Õ' => 'O',
                    'Ö' => 'Oe',
                    'Ø' => 'O',
                    'Ō' => 'O',
                    'Ő' => 'O',
                    'Œ' => 'Oe',
                    'Ơ' => 'O',
                    'Ṗ' => 'P',
                    'Ŕ' => 'R',
                    'Ř' => 'R',
                    'Ŗ' => 'R',
                    'Ś' => 'S',
                    'Ŝ' => 'S',
                    'Ş' => 'S',
                    'Š' => 'S',
                    'Ș' => 'S',
                    'Ṡ' => 'S',
                    'Ť' => 'T',
                    'Ţ' => 'T',
                    'Ṫ' => 'T',
                    'Ŧ' => 'T',
                    'Ț' => 'T',
                    'Þ' => 'Th',
                    'Ù' => 'U',
                    'Ú' => 'U',
                    'Û' => 'U',
                    'Ü' => 'Ue',
                    'Ũ' => 'U',
                    'Ū' => 'U',
                    'Ŭ' => 'U',
                    'Ů' => 'U',
                    'Ű' => 'U',
                    'Ų' => 'U',
                    'Ư' => 'U',
                    'Ẁ' => 'W',
                    'Ẃ' => 'W',
                    'Ŵ' => 'W',
                    'Ẅ' => 'W',
                    'Ý' => 'Y',
                    'Ÿ' => 'Y',
                    'Ŷ' => 'Y',
                    'Ỳ' => 'Y',
                    'Ź' => 'Z',
                    'Ż' => 'Z',
                    'Ž' => 'Z',
                ];
            }

            $string = str_replace(array_keys($UTF8_UPPER_ACCENTS), array_values($UTF8_UPPER_ACCENTS), $string);
        }

        return $string;
    }
}
