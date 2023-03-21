<?php
/**
 * @link http://www.anilchaudhari.com.np/
 * @author Anil Chaudhari. <imanilchaudhari@gmail.com>
 * @copyright Copyright (c) 2015 Anil Chaudhari.
 * @license http://www.anilchaudhari.com.np/license/
 */

use app\widgets\Alert;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ResetPasswordForm */

$this->title = 'Reset password';
?>
<section class="sample-page">
    <div class="container" data-aos="fade-up">
        <div class="login-box">
            <div class="login-logo">
                <h1>Reset Password</h1>
            </div>

            <?= Alert::widget() ?>

            <div class="login-box-body">
                <p class="login-box-msg"><?= Yii::t('app', 'Please choose your new password:') ?></p>

                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']) ?>

                <?= $form->field($model, 'password', [
                    'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span></div>{error}',
                ])->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-flat btn-primary form-control']) ?>

                </div>
                <?php ActiveForm::end() ?>

            </div>
        </div>
    </div>
</section>
