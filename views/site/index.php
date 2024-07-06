<?php

/* @var $this yii\web\View */

use app\helpers\Html;
use app\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = $model['title'];

?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
        <div class="row justify-content-between gy-5">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                <?php if ($model['slogan'] != '') { ?>
                    <h2 data-aos="fade-up"><?= $model['slogan'] ?></h2>
                <?php } else { ?>
                    <h2 data-aos="fade-up"><?= $model['title'] ?></h2>
                <?php } ?>

                <div class="d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <a href="<?= Url::to(['/site/contact']) ?>" class="btn-book-a-table">Contact Us</a>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                <img src="<?= $model['image'] ?>" class="img-fluid business-image" alt="" data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>
    </div>
</section>
<!-- End Hero Section -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>About Us</h2>
            </div>
            <div class="business-content">
                <?= substr($model['content'], 0, 500) ?>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Service Section ======= -->
    <section id="product" class="menu section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Our <?= $model['type'] ?>s</h2>
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        <?php foreach ($items as $item) { ?>
                            <div class="col-lg-4 menu-item">
                                <a href="<?= Url::to(['/service/view', 'id' => $item['id']]) ?>" class="link">
                                    <img src="<?= $item['image'] ?>" class="menu-img img-fluid service-image" alt="<?= $item['title'] ?>">
                                    <h4><?= $item['title'] ?></h4>
                                </a>
                                <p class="ingredients"><?= $item['location'] ?></p>
                                <p class="price">Rs <?= $item['price'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact Us</h2>
            </div>

            <div>
                <div class="mb-3">
                    <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=<?= $model['latitude'] ?>,<?= $model['longitude'] ?>&hl=en;z=14&output=embed" frameborder="0" allowfullscreen></iframe>
                </div>
                <!-- End Google Maps -->
            </div>

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-map flex-shrink-0"></i>
                        <div>
                            <h3>Our Address</h3>
                            <p><?= $model['location'] ?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p><?= $model['email'] ?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p><?= $model['phone'] ?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

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
            <!--End Contact Form -->
        </div>
    </section>
    <!-- End Contact Section -->
</main>
<!-- End #main -->