<?php

use app\helpers\Html;
use app\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">Contact Us</h2>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h1>Contact Us</h1>
            </div>

            <?= Alert::widget() ?>

            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-map flex-shrink-0"></i>
                        <div>
                            <h3>Our Address</h3>
                            <p><?= $model['location'] ?></p>
                        </div>
                    </div>
                </div>
                <!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p><?= $model['email'] ?></p>
                        </div>
                    </div>
                </div>
                <!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p><?= $model['phone'] ?></p>
                        </div>
                    </div>
                </div>
                <!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-share flex-shrink-0"></i>
                        <div>
                            <h3>Opening Hours</h3>
                            <p><?= $model['openings'][strtolower(date("l"))] ?></p>
                        </div>
                    </div>
                </div>
                <!-- End Info Item -->
            </div>

            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['class' => 'php-email-form p-3 p-md-4']]) ?>
            <?= $form->field($contact, 'business_id', ['template' => '{input}'])->hiddenInput(['value' => Yii::$app->id])  ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($contact, 'name')  ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($contact, 'email') ?>
                </div>
            </div>
            <?= $form->field($contact, 'subject') ?>
            <?= $form->field($contact, 'body')->textArea(['rows' => 6]) ?>
            <?= $form->field($contact, 'verifyCode')->widget(Captcha::class, [
                'imageOptions' => ['alt' => 'Captcha'],
                'template' => '<div class="row"><div class="col-md-6">{image}</div><div class="col-md-6"><p class="mb-0">Type above letters</p> {input} </div></div>',
            ]) ?>
            <div class="text-center">
                <?= Html::submitButton('Send Message', ['class' => 'btn btn-primary', 'name' => 'contact-button',]) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </section>
</main>