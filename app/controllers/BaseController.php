<?php
/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2015 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

namespace app\controllers;

use Yii;
use app\helpers\Url;

/**
 * Class BaseController
 *
 * @author Anil Chaudhari <imanilchaudhari@gmail.com>
 * @since 0.1.0
 */
class BaseController extends \yii\web\Controller
{
    public $is_mobile = false;
    public $is_tablet = false;
    public $is_robot = false;

    public $bodyClass = ['home'];

    /**
     * before action
     */
    public function beforeAction($action)
    {
        parent::beforeAction($action);

        $this->assignBodyClasses();

        if (!in_array(Yii::$app->controller->id, ['auth', 'ajax'])) {
            if (!in_array(Yii::$app->controller->action->id, ['login', 'logout', 'signup', 'captcha'])) {
                Url::remember();
            }
        }

        return $action;
    }

    /**
     * Redirect to login page
     */
    public function goLogin()
    {
        return $this->redirect(['/site/login']);
    }

    /**
     * Assigns module's and controller action's IDs as classes to HTML's <body> element.
     *
     * @since 0.0.1
     */
    private function assignBodyClasses()
    {
        $this->bodyClass[] = 'module-' . Yii::$app->controller->module->id;
        $this->bodyClass[] = 'action-' . Yii::$app->controller->action->id;
    }
}
