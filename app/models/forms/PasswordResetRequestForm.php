<?php
/**
 * @link http://www.anilchaudhari.com.np/
 * @copyright Copyright (c) 2015 SHT Solutions Pvt. Ltd.
 * @license http://www.anilchaudhari.com.np/license/
 */

namespace app\models\forms;

use Yii;
use app\models\User;
use yii\base\Model;

/**
 * Password reset request form
 *
 * @author SHT Solutions Pvt. Ltd. <info@anilchaudhari.com.np>
 * @since 0.1.0
 */
class PasswordResetRequestForm extends Model
{
    /**
     * @var string
     */
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVED],
                'message' => 'There is no user with such email.',
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVED,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return Yii::$app->mailer->compose([
                    'html' => 'passwordResetToken-html',
                    'text' => 'passwordResetToken-text',
                ], ['user' => $user])
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setTo($this->email)
                ->setSubject('Password reset for ' . Yii::$app->name)
                ->send();
            }
        }

        return false;
    }
}
