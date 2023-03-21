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
/* @var $model app\models\PasswordResetRequestForm */

$this->title = 'Request password reset';
?>
<section class="sample-page">
    <div class="container" data-aos="fade-up">
        <div class="login-box">
            <div class="login-logo">
                <h1>Request Password Reset</h1>
            </div>

            <?= Alert::widget() ?>

            <div class="login-box-body">
                <p class="login-box-msg">
                    <?= Yii::t('app', 'Please fill out your email. A link to reset password will be sent there.') ?>
                </p>

                <?php $form = ActiveForm::begin(['id' => 'request-password-token-form']) ?>

                <?= $form->field($model, 'email', [
                    'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span></div>{error}',
                ])->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-flat btn-primary form-control']) ?>

                </div>
                <?php ActiveForm::end() ?>

            </div>
        </div>
    </div>
</section>