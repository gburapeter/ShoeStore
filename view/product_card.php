<?php
/** @var string BASEURL */
/** @var Product $product */

ob_start();
?>
    <!-- Product -->
    <div class="col">
        <div class="card shadow-sm">
            <a href="<?php print(BASEURL); ?>/products/<?php print($product->getId()); ?>">
                <img class="product-image" height="225"
                     src="<?php print(BASEURL); ?>/resources/image/480x320/<?php print($product->getId()); ?>.jpg"
                     alt="Termékfotó">
            </a>
            <div class="card-body">
                <a href="<?php print(BASEURL); ?>/products/<?php print($product->getId()); ?>">
                    <h5 class="card-title"><?php print($product->getName()); ?></h5>
                </a>
                <p class="card-text"><?php print($product->getLead()); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark"><?php print(number_format($product->getPrice(), 0, "", " ")); ?> DKK</span>
                    <button type="button" class="btn btn-dark basket-add"
                            data-product="<?php print($product->getId()); ?>"><i class="bi bi-basket3-fill"></i>
                        Basket
                    </button>
                </div>
            </div>
        </div>
    </div> <!-- /Product -->

<?php
$__PRODUCT_CARD = ob_get_clean();
?>