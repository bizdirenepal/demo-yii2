<?php
/**
* @link https://starhightechsolution.com/
* @copyright Copyright (c) 2020 Anil Chaudhari
* @license https://opensource.org/licenses/BSD-3-Clause
*/

namespace app\helpers;

use Yii;
use yii\web\View as WebView;

/**
 * Description of View
 *
 * @author Anil Chaudhari <imanilchaudhari@gmail.com>
 * @since 1.0
 */
class View extends WebView
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Only get script inner of `script` tag.
     * @param string $js
     * @return string
     */
    public static function parseBlockJs($js)
    {
        $jsBlockPattern = '|^<script[^>]*>(?P<block_content>.+?)</script>$|is';
        if (preg_match($jsBlockPattern, trim($js), $matches)) {
            $js = trim($matches['block_content']);
        }
        return $js;
    }

    /**
     * Only get script inner of `script` tag.
     * @param string $js
     * @return string
     */
    public static function parseBlockCss($css)
    {
        $cssBlockPattern = '|^<style[^>]*>(?P<block_content>.+?)</style>$|is';
        if (preg_match($cssBlockPattern, trim($css), $matches)) {
            $css = trim($matches['block_content']);
        }
        return $css;
    }

    /**
     * Register script to controller.
     *
     * @param string $viewFile
     * @param array $params
     * @param integer|string $pos
     */
    public function renderJs($viewFile, $pos = null)
    {
        if ($pos == null) {
            $pos = WebView::POS_END;
        }
        $js = $this->render($viewFile);
        $this->registerJs(static::parseBlockJs($js), $pos);
    }

    /**
     * Register style to controller.
     *
     * @param string $viewFile
     * @param array $params
     * @param integer|string $pos
     */
    public function renderCss($viewFile)
    {
        $css = $this->render($viewFile);
        $this->registerCss(static::parseBlockCss($css));
    }

    /**
     * Compress JS.
     *
     * @param string $content
     * @param integer|string $pos
     */
    public function compressJs($content, $pos = null)
    {
        if ($pos == null) {
            $pos = WebView::POS_END;
        }
        $js = $this->render($content);
        $this->registerJs(static::parseBlockJs($js), $pos);
    }
}
