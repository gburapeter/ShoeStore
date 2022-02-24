<?php

require_once '../app/controllers/BasicController.php';

class SimplePageController extends BasicController
{

    public function __construct($URI_PARTS) {
        parent::__construct($URI_PARTS);
    }

    public function showTerms() {

        include '../view/terms.php';

        /** @var string $__CONTENT */
        $this->show($__CONTENT);
    }

    public function showAllProducts() {

        $products = new Products();

        $__ALL_PRODUCTS = "";
        foreach ($products->getAll() as $product) {

            /** @var string $__PRODUCT_CARD */
            include '../view/product_card.php';

            $__ALL_PRODUCTS .= $__PRODUCT_CARD;
        }

        include '../view/product_lister.php';

        /** @var string $__CONTENT */
        $this->show($__CONTENT);

    }

    public function showProduct($id) {

        $products = new Products();

        $__PRODUCTS_RANDOM = "";
        for($k=0;$k<3;$k++) {

            /** @var string $__PRODUCT_CARD */
            $product = $products->getRandom();
            while($product->getId() === $id) {
                $product = $products->getRandom();
            }

            include '../view/product_card.php';

            $__PRODUCTS_RANDOM .= $__PRODUCT_CARD;
        }

        $product = $products->getProductById($id);

        if(!$product) {
            header("Location: ". BASEURL . "/404");
        }

        include '../view/product_details.php';

        /** @var string $__CONTENT */
        $this->show($__CONTENT);
    }

    public function showError($code) {

        // Default
        $__ERROR_CODE    = $code;
        $__ERROR_TITLE   = "Error";
        $__ERROR_APOLOGY = "Unfortunately we cannot process the request.";
        http_response_code(400);

        if($code == 404) {
            $__ERROR_CODE    = "404";
            $__ERROR_TITLE   = "Not found";
            $__ERROR_APOLOGY = "Sorry, the page is not available";
            http_response_code(404);
        }

        include '../view/error.php';

        /** @var string $__CONTENT */
        $this->show($__CONTENT);

    }

}