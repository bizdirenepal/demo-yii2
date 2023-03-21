<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

namespace app\helpers;

/**
 * Class Url extends \yii\helpers\Url.
 */
class Url extends \yii\helpers\Url
{
    /**
     * Check whether we are in localhost or not.
     *
     * @return bool
     */
    public static function isLocalHost()
    {
        $whitelist = ['localhost', '127.0.0.1', '::1'];
        for ($i = 2; $i < 255; $i++) {
            array_push($whitelist, '192.168.1.' . $i);
        }

        if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
            return true;
        } else {
            return false;
        }
    }
}
