<?php

require_once "../app/models/Basket.php";


class BasketController
{
    public function __construct() {
        // Példányosítjuk a Basket Modelt, ami a kosár lesz maga
        $this->basket = new Basket();
        $this->basket->load();
    }

    public function add($DATA) {
        // Termék ellenőrzése:

        if(!array_key_exists("id", $DATA)) {
            // nincs termékkód megadva a kérésben
            exit("ERR");
        }

        $products = new Products();
        $product = $products->getProductById($DATA["id"]);

        if(!$product) {
            // nincs ilyen termék
            exit("ERR");
        }

        // darabszám:
        $pcs = $DATA["pcs"] ?? 1;       // ha nincs megadva, akkor legyen 1 az alapértelmezett
        $pcs = intval($pcs);            // legyen szám

        if($pcs < 1 || $pcs > 100) {
            // illegális mennyiség
            exit("ERR");
        }

        $myBasket = $this->basket->getContents();
        $inBasketQty = $myBasket[$product->getId()]["pcs"];

        if($product->getStock() < $pcs+$inBasketQty){
            exit("OOS");
        }

        // Itt már elvileg minden rendben van, meghívható a kosárba tevési függvény:
        $this->basket->add($product, $pcs);
        $this->basket->save();
        exit("OK");
    }

    public function remove($DATA){

        $products = new Products();
        $product = $products->getProductById($DATA["id"]);




        $this->basket->remove($product);
        $this->basket->save();
        exit("OK");


    }

    public function removeAll($DATA){

        $products = new Products();
        $product = $products->getProductById($DATA["id"]);




        $this->basket->removeAll($product);
        $this->basket->save();
        exit("OK");


    }

    public function setQuantity($DATA){
        $products = new Products();
        $product = $products->getProductById($DATA["id"]);
        $pcs = $DATA["pcs"];

       /* if($product->getStock() < $pcs){
            exit("OOS");
        }*/


        if($product->getStock() < $pcs){
            exit("OOS");
        }

        $this->basket->setQuantity($product, $pcs);
        $this->basket->save();
        exit("OK");
    }
}