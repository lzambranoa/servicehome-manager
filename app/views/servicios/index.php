
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>

            Gestión de Servicios

        </h2>

        <a href="<?= BASE_URL ?>servicios/create" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Nuevo Servicio

        </a>

    </div>

    <?php Session::mostrarFlash(); ?>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 w-100">

                    <thead>

                    <tr>

                        <th>ID</th>

                        <th>Cliente</th>

                        <th>Tipo</th>

                        <th>Técnico</th>

                        <th>Estado</th>

                        <th>Fecha</th>

                        <th class="text-end" style="min-width: 150px;">

                            Acciones

                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($servicios as $servicio): ?>

                        <tr>

                            <td>

                                <?= $servicio['id_servicio']; ?>

                            </td>

                            <td>

                                <?= htmlspecialchars($servicio['cliente']); ?>

                            </td>

                            <td>

                                <?= htmlspecialchars($servicio['tipo_servicio']); ?>

                            </td>

                            <td>

                                <?= htmlspecialchars($servicio['tecnico'] ?? 'Sin asignar'); ?>

                            </td>

                            <td>

                                <?php

                                $badge = "secondary";

                                switch ($servicio['estado']) {

                                    case "Pendiente":

                                        $badge = "warning";

                                        break;

                                    case "Asignado":

                                        $badge = "primary";

                                        break;

                                    case "En Proceso":

                                        $badge = "info";

                                        break;

                                    case "Finalizado":

                                        $badge = "success";

                                        break;

                                    case "Cancelado":

                                        $badge = "danger";

                                        break;

                                }

                                ?>

                                <span class="badge bg-<?= $badge ?>">

                                    <?= $servicio['estado']; ?>

                                </span>

                            </td>

                            <td>

                                <?= $servicio['fecha_programada']; ?>

                            </td>

<td class="text-end">

                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a href="<?= BASE_URL ?>servicios/edit/<?= $servicio['id_servicio']; ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="<?= BASE_URL ?>servicios/delete/<?= $servicio['id_servicio']; ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este servicio?')">

                                            <i class="bi bi-trash"></i>

                                        </a>
                                    </div>

                                </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>
            </div>
        </div>

    </div>

</div>