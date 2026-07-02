<!DOCTYPE html>

<html lang="es">

<head>

    <?php require_once "header.php"; ?>

</head>

<body>

<?php require_once "navbar.php"; ?>

<div class="container-fluid">

    <div class="row">

        <?php require_once "sidebar.php"; ?>

        <main class="col-md-10 ms-sm-auto px-4 py-4">

            <?php require_once $contenido; ?>

        </main>

    </div>

</div>

<?php require_once "footer.php"; ?>

</body>

</html>