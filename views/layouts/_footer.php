<?php

/**
 * @link https://starhightechsolution.com/
 * @copyright Copyright (c) 2022 Anil Chaudhari
 * @license https://opensource.org/licenses/BSD-2-Clause
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                    <h4>Address</h4>
                    <p><?= $this->params['model']['location'] ?></p>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-telephone icon"></i>
                <div>
                    <h4>Reservations</h4>
                    <p>
                        <strong>Email:</strong> <?= $this->params['model']['email'] ?><br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-clock icon"></i>
                <div>
                    <h4>Opening Hours</h4>
                    <p>
                       <?=$this->params['model']['openings'][strtolower(date("l"))]?>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Follow Us</h4>
                <div class="social-links d-flex">
                    <a href="<?= $this->params['model']['links']['twitter'] ?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="<?= $this->params['model']['links']['facebook'] ?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="<?= $this->params['model']['links']['instagram'] ?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="<?= $this->params['model']['links']['linkedin'] ?>" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>BizDire Nepal</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Powered By <a href="https://bizdirenepal.com/">BizDire Nepal</a>
        </div>
    </div>

</footer>
<!-- End Footer -->