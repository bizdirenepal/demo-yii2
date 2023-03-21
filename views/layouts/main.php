<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

use app\widgets\Alert;
use app\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginContent('@views/layouts/blank.php') ?>
<?= $this->render('main-header') ?>
<main class="main">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</main>
<?= $this->render('main-footer') ?>

<?php $this->endContent() ?>