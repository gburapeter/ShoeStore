<?php
/** @var string BASEURL */
/** @var string $__HEADER */
/** @var string $__CONTENT */
/** @var string $__FOOTER */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" type="image/png" href="<?php print(BASEURL); ?>/resources/image/favicon/favicon.png" sizes="32x32" />
    <title>Webshop</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/litera/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/litera/_bootswatch.scss" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/litera/_variables.scss" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/litera/bootstrap.css" rel="stylesheet">


    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php print(BASEURL); ?>/resources/style/style.css" rel="stylesheet">



</head>
<body>
<?php print($__HEADER); ?>
<?php print($__CONTENT); ?>
<?php print($__FOOTER); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    username = "<?php print(USERNAME); ?>";
</script>
<script src="<?php print(BASEURL); ?>/resources/script/script.js"></script>
</body>
</html>
