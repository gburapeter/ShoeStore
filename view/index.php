<?php
/** @var string $__PRODUCTS_PROMO */
/** @var string $__PRODUCTS_NORMAL */

ob_start();
?>

<main>

    <section class="py-3 container" id="welcome">
        <div class="row py-lg-5 py-sm-5">

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-3">
                    <h1 class="fw-light" id="welcomemessage">Welcome to our shop!</h1>
                    <p class="col-md-12 fs-4" id="welcomenike">
                        Sport keeps us fit. Keeps you mindful. Brings us together. Through sport we have the power to change lives. Whether it is through stories of inspiring athletes. Helping you to get up and get moving. Sporting goods featuring the latest technologies, to up your performance. Beat your PB. Our sneakerstore offers a home to the runner, the basketball player, the soccer kid, the fitness enthusiast. The weekend hiker that loves to escape the city. The yoga teacher that spreads the moves. The 3-Stripes are seen in the music scene. On stage, at festivals. Our sports clothing keeps you focused before that whistle blows. During the race. And at the finish lines.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="album py-5 bg-gradient bg-dark">
            <div class="container">
                <h1 class="fw-light text-light text-center">On sale products</h1>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                    <?php print($__PRODUCTS_PROMO); ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="album py-5 bg-gradient bg-body">
            <div class="container">
                <h1 class="fw-light">New Arrivals</h1>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php print($__PRODUCTS_NORMAL); ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
$__CONTENT = ob_get_clean();
?>