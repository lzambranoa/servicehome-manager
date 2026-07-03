<div class="container">

    <h2 class="mb-4">

        Editar Técnico

    </h2>

    <form action="<?= BASE_URL ?>tecnicos/update" method="POST">

        <input type="hidden" name="id_tecnico" value="<?= $tecnico['id_tecnico'] ?>">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label>Nombre</label>

                <input class="form-control" name="nombre" value="<?= htmlspecialchars($tecnico['nombre']) ?>" required>

            </div>

            <div class="col-md-6 mb-3">

                <label>Documento</label>

                <input class="form-control" name="documento" value="<?= htmlspecialchars($tecnico['documento']) ?>"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label>Teléfono</label>

                <input class="form-control" name="telefono" value="<?= htmlspecialchars($tecnico['telefono']) ?>"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label>Correo</label>

                <input type="email" class="form-control" name="correo"
                    value="<?= htmlspecialchars($tecnico['correo']) ?>" required>

            </div>

            <div class="col-md-6 mb-4">

                <label>Especialidad</label>

                <select name="especialidad" class="form-select">

                    <?php

                    $especialidades = [

                        "Instalacion",

                        "Mantenimiento",

                        "Domotica",

                        "Multiservicio"

                    ];

                    foreach ($especialidades as $esp) {

                        $selected =

                            $esp == $tecnico["especialidad"]

                            ?

                            "selected"

                            :

                            "";

                        echo "<option $selected>$esp</option>";

                    }

                    ?>

                </select>

            </div>

            <div class="col-md-6 mb-4">

                <label>Estado</label>

                <select name="estado" class="form-select">

                    <option <?= $tecnico["estado"] == "Activo" ? "selected" : "" ?>>

                        Activo

                    </option>

                    <option <?= $tecnico["estado"] == "Inactivo" ? "selected" : "" ?>>

                        Inactivo

                    </option>

                </select>

            </div>

        </div>

        <button class="btn btn-success">

            Actualizar

        </button>

        <a href="<?= BASE_URL ?>tecnicos" class="btn btn-secondary">

            Cancelar

        </a>

    </form>

</div>