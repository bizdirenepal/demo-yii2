<?php
/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginContent('@views/layouts/blank.php') ?>
<?= $this->render('main-header') ?>
<?= $content ?>
<?= $this->render('main-footer') ?>
<?php $this->endContent() ?>
