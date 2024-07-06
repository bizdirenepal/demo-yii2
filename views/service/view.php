<?php


$this->title = 'Service - ' . $product['title'];
$this->params['breadcrumbs'][] = $this->title;
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title"><?=$product['title']?></h2>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-md-8">
                    <div class="card text-center mb-md-0 br-0">
                        <div class="card-img">
                            <img src="<?=$product['image']?>" alt="<?=$product['title']?>" class="cover-image br-0" style="max-height: 400px; overflow: hidden; object-fit: cover; width:100%">
                        </div>
                    </div>
                    <div class="item-card-text text-start mt-2">
                        <h3 class="mb-2"><?=$product['title']?></h3>
                        <small class="text-dark">
                            <i class="fa fa-briefcase me-1"></i> <?=$product['title']?>
                            <i class="fa fa-map-marker ms-3 me-1"></i><?=$product['city']?>
                            <i class="fa fa-calendar ms-3 me-1"></i><?=$product['created_at']?>
                            <i class="fa fa-eye ms-3 me-1"></i> <?=$product['hits']?>
                        </small>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Overview</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <div class="product.content">
                                    <?= $product['content'] ?>
                                </div>
                            </div>
                            <h4 class="card-title mt-5 mb-3">Contact Info</h4>
                            <div class="item-user mt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="font-weight-normal">
                                            <span><i class="fa fa-map me-3 mb-2"></i></span>
                                            <a href="javascript:void(0)" class="text-body"><?=$product['city']?>, <?=$product['location']?></a>
                                        </h6>
                                        <h6 class="font-weight-normal">
                                            <span><i class="fa fa-envelope me-3 mb-2"></i></span>
                                            <a href="javascript:void(0)" class="text-body"><?=$model['email']?> </a>
                                        </h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-weight-normal">
                                            <span><i class="fa fa-phone me-3  mb-2"></i></span>
                                            <a href="javascript:void(0)" class="text-secondary"> <?=$model['phone']?></a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Business Overview-->
                    <div class="card mt-5 mb-5">
                        <div class="card-header">
                            <h3 class="card-title">Rating And Reviews</h3>
                        </div>
                        <div class="card-body">
                            <h4><?=$product['review_count']?> Reviews</h4>
                            <div id="review-items" class="row">

                                <?php foreach ($reviews as $item) : ?>
                                <div class="col-md-12 border-top" data-key="review.id">
                                    <div class="mt-4">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-weight-semibold"><?=$item['name']?>
                                                <span class="fs-14 ms-0" data-bs-toggle="tooltip" data-bs-placement="top" title="verified">
                                                    <i class="fa fa-check-circle-o text-success"></i>
                                                </span>
                                                <span class="fs-14 ms-2"> <?=$item['rating']?> <i class="fa fa-star text-yellow"></i> </span>
                                            </h5>
                                            <small class="text-muted">
                                                <i class="fa fa-calendar"></i> <?=$item['created_at']?>
                                            </small>
                                            <p class="font-13  mb-2 mt-2">
                                                <?=$item['review']?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <a href="https://bizdirenepal.com/<?=$model['slug']?>/<?=$product['slug']?>#review-form" target="_blank" class="btn btn-primary mt-4">Write A Review</a>
                </div>
                <div class="col-md-4">
                    <div class="page-sidebar" style="width: 100%; height: 800px;">
                        <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/bizdirenepal/" data-tabs="timeline" data-width="" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=416&amp;height=500&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fbizdirenepal%2F&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline&amp;width=">
                            <span style="vertical-align: bottom; width: 340px; height: 800px;">
                                <iframe name="f2dbe9709bf957c" width="1000px" height="800px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v16.0/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df11eb75c46921c4%26domain%3Dbizdirenepal.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fbizdirenepal.com%252Ffb55c001640f38%26relation%3Dparent.parent&amp;container_width=416&amp;height=800&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fbizdirenepal%2F&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline&amp;width=" style="border: none; visibility: visible; width: 340px; height: 800px;" class="">
                                </iframe>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>