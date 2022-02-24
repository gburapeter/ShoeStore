<?php
ob_start();
?>
<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Jump to top of the page</a>
        </p>
        <p class="mb-1"> &copy; Webshop
            <?php print(date("Y")); ?>
        </p>
    </div>
</footer>
<?php
$__FOOTER = ob_get_clean();
?>