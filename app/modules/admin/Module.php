<?php

namespace app\modules\admin;

use Yii;
use app\helpers\Html;
use yii\base\BootstrapInterface;
use yii\di\Instance;
use yii\web\ForbiddenHttpException;
use yii\web\User;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public $layout = 'main';

    /**
     * @var User User for check access.
     */
    private $_user = 'user';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $user = $this->getUser();
        if ($user->isGuest) {
            $this->layout = 'blank';
            Yii::$app->errorHandler->errorAction = '/site/error';

        } else {
            Yii::$app->errorHandler->errorAction = '/admin/site/error';
        }
    }

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->setComponents([
            'request' => [
                'class' => 'yii\web\Request',
                'csrfParam' => '_csrf-admin',
                // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                'cookieValidationKey' => 'HqGoyA3Z2wn6wOEpRAmWRd9ZokJZc95P',
            ],
            'session' => [
                'class' => 'yii\web\Session',
                'name' => '_session-admin',
            ],
        ]);

        // module bootstrap
        $app->getUrlManager()->addRules([
            [
                'class' => 'yii\web\UrlRule',
                'pattern' => $this->id . '/<action:[-\w]+>',
                'route' => $this->id . '/default/<action>',
            ]
        ], false);
    }

    /**
     * Get user
     * @return User
     */
    public function getUser()
    {
        if (!$this->_user instanceof User) {
            $this->_user = Instance::ensure($this->_user, User::class);
        }
        return $this->_user;
    }

    /**
     * Set user
     * @param User|string $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /* @var $action \yii\base\Action */
            $user = $this->getUser();
            $this->checkAccess($user);
            return true;
        }
        return false;
    }

    /**
     * Denies the access of the user.
     * The default implementation will redirect the user to the login page if he is a guest;
     * if the user is already logged, a 403 HTTP exception will be thrown.
     * @param  User $user the current user
     * @throws ForbiddenHttpException if the user is already logged in.
     */
    protected function checkAccess($user)
    {
        if ($user->getIsGuest()) {

            $message = Yii::t('app', 'Please {login} before you continue.', [
                'login' => Html::a('&nbsp;login&nbsp;', ['/admin/site/login']),
            ]);

            // $user->loginRequired();
            Yii::$app->session->setFlash('warning', $message);
            // throw new ForbiddenHttpException($message);
        }
    }
}
