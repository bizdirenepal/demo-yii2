<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

use app\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginContent('@views/layouts/blank.php') ?>
<?= $this->render('_header') ?>
<main class="main">
    <?= Alert::widget() ?>
    <?= $content ?>
</main>
<?= $this->render('_footer') ?>

<?php $this->endContent() ?>