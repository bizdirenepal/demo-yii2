<?php

use app\helpers\Url;

$this->title = 'Our Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">Our <?= $model['type'] ?>s</h2>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h1>Our <?= $model['type'] ?>s</h1>
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
</main>