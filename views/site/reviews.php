<?php


$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">Reviews</h2>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h1>Our Reviews</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rating And Reviews</h3>
                </div>
                <div class="card-body">
                    <h4><?= $model['review_count'] ?> Reviews</h4>
                    <div id="review-items" class="row">
                        <?php foreach ($items as $item) : ?>
                            <div class="col-md-12 border-top" data-key="review.id">
                                <div class="mt-4">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-weight-semibold"><?= $item['name'] ?>
                                            <span class="fs-14 ms-0" data-bs-toggle="tooltip" data-bs-placement="top" title="verified">
                                                <i class="fa fa-check-circle-o text-success"></i>
                                            </span>
                                            <span class="fs-14 ms-2"> <?= $item['rating'] ?> <i class="fa fa-star text-yellow"></i> </span>
                                        </h5>
                                        <small class="text-muted">
                                            <i class="fa fa-calendar"></i> <?= $item['created_at'] ?>
                                        </small>
                                        <p class="font-13  mb-2 mt-2">
                                            <?= $item['review'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <a href="https://bizdirenepal.com/<?= $model['slug'] ?>/reviews#review-form" target="_blank" class="btn btn-primary mt-4">Write A Review</a>
        </div>
    </section>
</main>