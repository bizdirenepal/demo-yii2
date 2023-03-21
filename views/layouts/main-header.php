<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

use app\helpers\Json;

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
            <h1>Demo Yii2<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#product">Service</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <!-- .navbar -->

        <a class="btn-book-a-table" href="#book-a-table">Book a Table</a>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
<!-- End Header -->