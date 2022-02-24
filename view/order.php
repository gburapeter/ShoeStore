<?php
/** @var array $basket_contents */
ob_start();
?>

<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

?>

    <main>

        <section id="product">
            <div class="album py-5 bg-gradient bg-body">
                <div class="container">
                    <!-- <div id="asd"><button type="button" id="clickme">Click Me!</button></div>-->

                    <div class="row">
                        <div class="col-md-8 col-lg-8">


                            <table class="table table-bordered  table-hover">

                                <h3 class="display-8 mb-5 text-center">Shopping Cart</h3>
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="col-6">Shoe</th>
                                    <th scope="col" class="text-end">Quantity</th>
                                    <th scope="col" class="text-end">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total = 0;
                                console_log($_SESSION["basket"]);

                                foreach ($_SESSION["basket"] as $id => $row) {
                                    /** @var Product $prod */
                                    $prod = $row["prod"];

                                    /** @var integer $pcs */
                                    $pcs = $row["pcs"];

                                    $price = $prod->getPrice() * $pcs;
                                    $total += $price;


                                    print('<tr>');
                                    /*  print('   <td class="col-4"><a href="' . BASEURL.'/products/'. $prod->getId() . '">'.$prod->getName().'</a></td>');*/
                                    print(' <td class="col-4"><a href="' . BASEURL . '/products/' . $prod->getId() . '"><img src="' . BASEURL . '/resources/image/480x320/' . $prod->getId() . '.jpg" width=125px height=125px class="img-fluid img-thumbnail" ></a> <span class="image-texts" data-id="1">' . $prod->getName() . '</span></td>');
                                    print('   <td class="text-end">' . $pcs . ' </td>');
                                    print('   <td class="text-end">' . number_format($price, 2, '.', '') . ' kr.</td>');


                                    print('<td class="text-end"><input type="number" data-quantity="" class="form-control form-control-lg text-center quantity-input" id="' . $prod->getId() . '" data-product="' . $prod->getId() . '"  placeholder="qty" value="' . $pcs . '" min="0"></td>');


                                    print('  <td class="text-center"><button class="btn btn-danger btn-sm remove-one" data-product="' . $prod->getId() . '"><i class="bi bi-calendar-minus"></i>Remove</button></td>');
                                    print('  <td class="text-center"><button class="btn btn-danger btn-sm remove-all" data-product="' . $prod->getId() . '"><i class="bi bi-calendar-minus"></i>Remove All</button></td>');


                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <div id="item1"></div>
                                    <th class="table-col-product" scope="col">Total</th>
                                    <th class="text-end" scope="col"
                                        colspan="2"><?php print(number_format($total, 0, '', " ")); ?> kr.
                                    </th>
                                </tr>
                                </tfoot>
                            </table>


                        </div>
                    </div>
        </section>

    </main>
<?php
$__CONTENT = ob_get_clean();
?>