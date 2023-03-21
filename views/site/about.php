<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>The user is provided with a field for entering the URL, by pressing the "Reduce" button, the user is provided with a short link with the current domain of the site.</p>
    <p>When clicking on the reduced link, the user will be redirected to the original page.</p>

    <p>The user has the ability to:</p>
    <ul>
        <li>create your short link;</li>
        <li>the ability to create links with a limited lifetime.</li>
    </ul>
    <p>The user who creates the link also receives a link to the conversion statistics:</p>
    <ul>
        <li>date and time of transition;</li>
        <li>geo-information (country, city);</li>
        <li>name and version of the browser and OS.</li>
    </ul>
</div>