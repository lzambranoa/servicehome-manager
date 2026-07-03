
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

    <div class="d-flex flex-column gap-2 w-100">
        <h2 class="mb-0">Gestión de Técnicos</h2>
        <?php Session::mostrarFlash(); ?>
    </div>

    <a href="<?= BASE_URL ?>tecnicos/create" class="d-inline-block">

       <button class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nuevo Técnico

        </button>

    </a>
    

</div>
<div class="mb-3" style="max-width: 420px;">
    <input class="form-control" placeholder="Buscar técnico..." aria-label="Buscar técnico">
</div>

<div class="table-responsive">
<table class="table table-bordered table-hover table-striped align-middle">

    <thead class="table-dark">

        <tr>

            <th>Código</th>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Especialidad</th>
            <th>Estado</th>
            <th width="150">Acciones</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach($tecnicos as $tecnico): ?>

        <tr>

            <td><?= $tecnico['id_tecnico']; ?></td>

            <td><?= $tecnico['nombre']; ?></td>

            <td><?= $tecnico['documento']; ?></td>

            <td><?= htmlspecialchars($tecnico['telefono']); ?></td>
            
            <td><?= htmlspecialchars($tecnico['correo']); ?></td>

            <td><?= $tecnico['especialidad']; ?></td>

            <td>
            <?php if ($tecnico['estado'] == 'Activo'): ?>
                
                <span class="badge bg-success">
                <i class="bi bi-check-circle-fill"></i>    
                Activo
            </span>
            <?php else: ?>
                <span class="badge bg-danger">Inactivo</span>
            <?php endif; ?>
            </td>
            <td>

            <a href="<?= BASE_URL ?>tecnicos/edit/<?= $tecnico['id_tecnico'] ?>"
                class="btn btn-warning btn-sm">

                <i class="bi bi-pencil-square"></i>

            </a>

            <a href="<?= BASE_URL ?>tecnicos/delete/<?= $tecnico['id_tecnico'] ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Desea eliminar este técnico?')">

                <i class="bi bi-trash"></i>

            </a>

            </td>

        </tr>

        <?php endforeach; ?>

    </tbody>

</table>