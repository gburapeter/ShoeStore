<?php
/** @var string BASEURL */
/** @var Product $product */
/** @var string $__PRODUCTS_RANDOM */

ob_start();
?>
    <section id="product">
        <div class="album py-5 bg-gradient bg-body">
            <div class="container">
                <h1 class="fw-light"><?php print($product->getName()); ?></h1>

                <div class="row g-5">

                    <div class="col-md-7 col-lg-8">
                        <img class="product-image" src="<?php print(BASEURL); ?>/resources/image/960x540/<?php print($product->getId()); ?>.jpg" alt="Termékfotó" width="100%">
                    </div>

                    <div class="col-md-5 col-lg-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="">Price:</span>
                            <span class="text-primary"><?php print(number_format($product->getPrice(), 0, "", " "));?> kr.</span>
                        </h4>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="">On stock:</span>
                            <?php

                            if($product->getStock()) {
                                print('<span class="text-success">'. $product->getStock() .'</span>');
                            } else {
                                print('<span class="text-warning">Only for preorder</span>');
                            }

                            ?>
                        </h4>


                        <form class="p-2 row align-items-center">
                            <div class="col-md-6">
                                <div class="input-group mb-3 align-items-center">
                                    <input type="number" class="form-control" id="product-count" placeholder="db" value="1" min="1" >
                                    <span class="input-group-text">Qty</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3  align-items-center">
                                    <button type="button" class="btn btn-success btn-lg basket-add-count" data-product="<?php print($product->getId()); ?>">Add to cart</button>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <h5 class="text-muted">Have a question? Contact us!</h5>
                        <p>We're here for you 24/7!</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Phone number</div>
                                    +36 20 409 35 98
                                </div>
                                <a class="btn btn-outline-secondary mt-1" href="tel:+3618864700" target="_blank"><i class="bi bi-telephone-fill"></i></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Email us</div>
                                    gburapeti@gmail.com
                                </div>
                                <a class="btn btn-outline-secondary mt-1" href="mailto:info@example.com" target="_blank"><i class="bi bi-envelope-fill"></i></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Our address</div>
                                    1083 Budapest, Práter utca 50/A
                                </div>
                                <a class="btn btn-outline-secondary mt-1" href="https://goo.gl/maps/TRTpMjypbofQ78489" target="_blank"><i class="bi bi-pin-angle-fill"></i></a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-12">
                        <h3 class="mt-md-2">Description and features</h3>
                        <p><?php print($product->getDescription()); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section>
        <div class="album py-5 bg-gradient bg-body">
            <div class="container">
                <h2 class="fw-light">Browse our other products</h2>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php print($__PRODUCTS_RANDOM); ?>
                </div>
            </div>
        </div>
    </section>

<?php
$__CONTENT = ob_get_clean();
?>