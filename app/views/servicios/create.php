<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">

                Nuevo Servicio

            </h3>

        </div>

        <div class="card-body">

            <form
                action="<?= BASE_URL ?>servicios/store"
                method="POST">

                <?php require_once "form.php"; ?>

            </form>

        </div>

    </div>

</div>