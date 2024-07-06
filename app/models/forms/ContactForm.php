<?php

/**
 * @link http://anilchaudhari.com.np/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

namespace app\models\forms;

use Yii;
use app\services\BusinessService;
use yii\base\Model;

/**
 * Class ContactForm
 *
 * @author Anil Chaudhari <imanilchaudhari@gmail.com>
 * @since 0.1.0
 */
class ContactForm extends Model
{
    /**
     * @var int
     */
    public $business_id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $body;

    /**
     * @var
     */
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // business_id, name, email, subject and body are required
            [['business_id', 'name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Save contact
     */
    public function saveContact()
    {
        return (new BusinessService())->createContact($this->attributes);
    }
}
