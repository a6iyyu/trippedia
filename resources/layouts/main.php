<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index" />
    <meta name="description" content="<?= $description ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:image" content="<?= asset('') ?>" />
    <meta name="twitter:title" content="<?= $title ?>" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <meta name="twitter:image" content="<?= asset('') ?>" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>" />
    <?php stack('styles') ?>
    <link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="icon" href="<?= asset('') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require __DIR__ . "/../shared/navigation/header.php"; ?>
    <?= $content ?>
    <?php require __DIR__ . "/../shared/navigation/footer.php"; ?>
    <script src="<?= asset('bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/app.js') ?>"></script>
</body>

</html>