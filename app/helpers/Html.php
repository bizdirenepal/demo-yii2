<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

namespace app\helpers;

/**
 * Class Html extends \yii\helpers\Html.
 *
 */
class Html extends \yii\helpers\Html
{
    /**
     * Converts the given text in to clickable if the text contains html with anchor tags.
     * @param $text string
     * @return string
     */
    public static function makeClickable($text)
    {
        return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
    }

    /**
     * Remove empty tags.
     *
     * @param string $html
     * @return string
     */
    public static function removeEmptyTag($html)
    {
        $html = str_replace('&nbsp;', '', $html);
        $pattern = '/<[^\/>]*>([\s]?)*<\/[^>]*>/'; // use this pattern to remove any empty tag
        return preg_replace($pattern, '', $html);
    }

    /**
     * Get clean string
     */
    public static function getCleanStrings($string)
    {
        $output = preg_replace('/<iframe.*?\/iframe>/i', '', $string);
        $output = preg_replace('/<img[^>]+\>/i', ' ', $output);
        $output = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $output);
        $output = preg_replace('/(<font[^>]*>)|(<\/font>)/', '', $output);
        $output = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $output);
        $output = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $output);
        return $output;
    }

    /**
     * Remove Emojies.
     *
     * @param string $text
     * @return string
     */
    public static function removeEmojies($text)
    {

        $clean_text = '';

        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $clean_text = preg_replace($regexEmoticons, '', $text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $clean_text = preg_replace($regexSymbols, '', $clean_text);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $clean_text = preg_replace($regexTransport, '', $clean_text);

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        $clean_text = preg_replace($regexMisc, '', $clean_text);

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        // Match Flags
        $regexDingbats = '/[\x{1F1E6}-\x{1F1FF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        // Others
        $regexDingbats = '/[\x{1F910}-\x{1F95E}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        $regexDingbats = '/[\x{1F980}-\x{1F991}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        $regexDingbats = '/[\x{1F9C0}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        $regexDingbats = '/[\x{1F9F9}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        return $clean_text;
    }
}
