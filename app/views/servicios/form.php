<div class="row">

    <!-- Cliente -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Cliente *</label>

        <input
            type="text"
            name="cliente"
            class="form-control"
            required
            maxlength="100"
            value="<?= isset($servicio) ? htmlspecialchars($servicio['cliente']) : '' ?>">
    </div>

    <!-- Teléfono -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Teléfono *</label>

        <input
            type="text"
            name="telefono_cliente"
            class="form-control"
            required
            maxlength="20"
            value="<?= isset($servicio) ? htmlspecialchars($servicio['telefono_cliente']) : '' ?>">
    </div>

    <!-- Correo -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Correo electrónico</label>

        <input
            type="email"
            name="correo_cliente"
            class="form-control"
            maxlength="100"
            value="<?= isset($servicio) ? htmlspecialchars($servicio['correo_cliente']) : '' ?>">
    </div>

    <!-- Fecha -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Fecha programada *</label>

        <input
            type="date"
            name="fecha_programada"
            class="form-control"
            required
            value="<?= isset($servicio) ? $servicio['fecha_programada'] : '' ?>">
    </div>

    <!-- Dirección -->
    <div class="col-12 mb-3">
        <label class="form-label">Dirección *</label>

        <input
            type="text"
            name="direccion"
            class="form-control"
            required
            maxlength="255"
            value="<?= isset($servicio) ? htmlspecialchars($servicio['direccion']) : '' ?>">
    </div>

    <!-- Tipo Servicio -->
    <div class="col-md-6 mb-3">

        <label class="form-label">Tipo de servicio *</label>

        <select
            name="tipo_servicio"
            class="form-select"
            required>

            <option value="">Seleccione...</option>

            <?php

            $tipos = [

                "Instalacion",
                "Mantenimiento",
                "Domotica"

            ];

            foreach($tipos as $tipo):

            ?>

            <option
                value="<?= $tipo ?>"
                <?= (isset($servicio) && $servicio["tipo_servicio"]==$tipo) ? "selected" : "" ?>>

                <?= $tipo ?>

            </option>

            <?php endforeach; ?>

        </select>

    </div>

    <!-- Técnico -->

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Técnico asignado

        </label>

        <select
            name="id_tecnico"
            class="form-select">

            <option value="">

                Sin asignar

            </option>

            <?php foreach($tecnicos as $tecnico): ?>

                <option

                    value="<?= $tecnico['id_tecnico'] ?>"

                    <?= (isset($servicio) && $servicio["id_tecnico"]==$tecnico["id_tecnico"])

                    ?

                    "selected"

                    :

                    ""

                    ?>>

                    <?= htmlspecialchars($tecnico["nombre"]) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <!-- Estado -->

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Estado

        </label>

        <select

            name="estado"

            class="form-select"

            required>

            <?php

            $estados = [

                "Pendiente",

                "Asignado",

                "En Proceso",

                "Finalizado",

                "Cancelado"

            ];

            foreach($estados as $estado):

            ?>

            <option

                value="<?= $estado ?>"

                <?= (isset($servicio) && $servicio["estado"]==$estado)

                ?

                "selected"

                :

                (!isset($servicio) && $estado=="Pendiente" ? "selected" : "")

                ?>>

                <?= $estado ?>

            </option>

            <?php endforeach; ?>

        </select>

    </div>

    <!-- Descripción -->

    <div class="col-12 mb-4">

        <label class="form-label">

            Descripción del servicio *

        </label>

        <textarea

            name="descripcion"

            class="form-control"

            rows="5"

            required><?= isset($servicio) ? htmlspecialchars($servicio["descripcion"]) : "" ?></textarea>

    </div>

</div>

<hr>

<div class="d-flex justify-content-end">

    <a
        href="<?= BASE_URL ?>servicios"
        class="btn btn-secondary me-2">

        Cancelar

    </a>

    <button
        type="submit"
        class="btn btn-success">

        <i class="bi bi-check-circle"></i>

        Guardar Servicio

    </button>

</div>