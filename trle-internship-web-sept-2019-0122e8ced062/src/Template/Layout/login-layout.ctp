<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $this->Html->meta(
        'description',
        ''
    );
    ?>
    <?= $this->Html->meta(
        'author',
        ''
    );
    ?>
    <title>SB Admin - Login</title>

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body class="bg-dark">

<?= $this->fetch('content'); ?>

<!-- Bootstrap core JavaScript-->
<?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

<!-- Core plugin JavaScript-->
<?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>

</body>

</html>
