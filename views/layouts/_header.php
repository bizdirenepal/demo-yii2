<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

use app\helpers\Json;
use app\helpers\Url;

/* @var $this yii\web\View */

$identity = Json::htmlEncode([
    'identity' => Yii::$app->user->identity,
]);
$this->registerJs("var _user = {$identity};", $this::POS_HEAD);
?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="img/logo.png" alt=""> -->
            <h1><?= Yii::$app->name ?><span></span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="<?= Url::home(); ?>">Home</a></li>
                <li><a href="<?= Url::to(['/service/index']); ?>">Services</a></li>
                <li><a href="<?= Url::to(['/site/about']); ?>">About Us</a></li>
                <li><a href="<?= Url::to(['/site/reviews']); ?>">Reviews</a></li>
            </ul>
        </nav>
        <!-- .navbar -->

        <a class="btn-book-a-table" href="<?= Url::to(['/site/contact']); ?>">Contact Us</a>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
<!-- End Header -->