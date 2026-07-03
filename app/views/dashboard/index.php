
<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-0">
                Dashboard
            </h2>
            <p class="text-muted">

            Bienvenido al sistema de gestión de servicios técnicos.

            </p>

            <small class="text-muted">
                Resumen general de ServiceHome Manager
            </small>
        </div>

        <a href="<?= BASE_URL ?>servicios/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Nuevo Servicio
        </a>

    </div>

    <!-- Tarjetas -->

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">

                        <div>

                            <small class="text-muted">
                                Técnicos
                            </small>

                            <h2 class="fw-bold mt-2">
                                <?= $totalTecnicos ?>
                            </h2>

                            <small class="text-success">
                                Registrados
                            </small>

                        </div>

                        <div class="align-self-center">

                            <i class="bi bi-person-workspace text-primary fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">

                        <div>

                            <small class="text-muted">

                                Servicios

                            </small>

                            <h2 class="fw-bold mt-2">

                                <?= $totalServicios ?>

                            </h2>

                            <small class="text-primary">

                                Registrados

                            </small>

                        </div>

                        <div class="align-self-center">

                            <i class="bi bi-tools text-primary fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">

                        <div>

                            <small class="text-muted">

                                Pendientes

                            </small>

                            <h2 class="fw-bold mt-2">

                                <?= $pendientes ?>

                            </h2>

                            <small class="text-warning">

                                Por atender

                            </small>

                        </div>

                        <div class="align-self-center">

                            <i class="bi bi-hourglass-split text-warning fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">

                        <div>

                            <small class="text-muted">

                                Finalizados

                            </small>

                            <h2 class="fw-bold mt-2">

                                <?= $finalizados ?>

                            </h2>

                            <small class="text-success">

                                Completados

                            </small>

                        </div>

                        <div class="align-self-center">

                            <i class="bi bi-check-circle-fill text-success fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Últimos servicios -->

    <div class="card shadow border-0 mt-5">

        <div class="card-header bg-white">

            <h5 class="mb-0">

                Últimos Servicios

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle table-sm">

                <thead>

                    <tr>

                        <th>Cliente</th>

                        <th>Tipo</th>

                        <th>Técnico</th>

                        <th>Estado</th>

                        <th>Fecha</th>

                    </tr>

                </thead>

                <tbody>
                    <?php if (!empty($ultimosServicios)): ?>
                        <?php foreach ($ultimosServicios as $servicio): ?>

                            <tr>

                                <td>

                                    <?= htmlspecialchars($servicio["cliente"]) ?>

                                </td>

                                <td>

                                    <?= htmlspecialchars($servicio["tipo_servicio"]) ?>

                                </td>

                                <td>

                                    <?= $servicio["tecnico"] ?: "Sin asignar" ?>

                                </td>

                                <td>

                                    <?php

                                    $badge = "secondary";

                                    switch ($servicio["estado"]) {

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

                                        <?= $servicio["estado"] ?>

                                    </span>

                                </td>

                                <td>

                                    <?= date("d/m/Y", strtotime($servicio["fecha_programada"])) ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>
                    <?php else: ?>

                        <tr>

                            <td colspan="5" class="text-center text-muted">

                                No existen servicios registrados.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>
            </div>

        </div>

    </div>

    <!-- Acciones rápidas -->

    <div class="row mt-4">

        <div class="col-12 col-md-6">

            <div class="card shadow border-0">

                <div class="card-header bg-white">

                    <h5>

                        Acciones rápidas

                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-grid gap-2">

                        <a class="btn btn-outline-primary" href="<?= BASE_URL ?>tecnicos/create">

                            <i class="bi bi-person-plus-fill"></i>

                            Nuevo Técnico

                        </a>

                        <a class="btn btn-outline-success" href="<?= BASE_URL ?>servicios/create">

                            <i class="bi bi-tools"></i>

                            Nuevo Servicio

                        </a>

                        <a class="btn btn-outline-secondary" href="<?= BASE_URL ?>tecnicos">

                            Ver Técnicos

                        </a>

                        <a class="btn btn-outline-secondary" href="<?= BASE_URL ?>servicios">

                            Ver Servicios

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>