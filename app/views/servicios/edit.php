<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">

                Editar Servicio

            </h3>

        </div>

        <div class="card-body">

            <form
                action="<?= BASE_URL ?>servicios/update"
                method="POST">

                <input
                    type="hidden"
                    name="id_servicio"
                    value="<?= $servicio["id_servicio"] ?>">

                <?php require_once "form.php"; ?>

            </form>

        </div>

    </div>

</div>