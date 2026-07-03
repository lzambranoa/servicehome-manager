<div class="container">

    <h2 class="mb-4">Registrar Técnico</h2>

    <form action="<?= BASE_URL ?>tecnicos/store" method="POST">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">Nombre</label>

                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Documento</label>

                <input
                    type="text"
                    name="documento"
                    class="form-control"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Teléfono</label>

                <input
                    type="text"
                    name="telefono"
                    class="form-control"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Correo</label>

                <input
                    type="email"
                    name="correo"
                    class="form-control"
                    required>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">Especialidad</label>

                <select
                    name="especialidad"
                    class="form-select"
                    required>

                    <option value="">Seleccione...</option>
                    <option>Instalacion</option>
                    <option>Mantenimiento</option>
                    <option>Domotica</option>
                    <option>Multiservicio</option>

                </select>

            </div>

        </div>

        <button class="btn btn-primary">

            Guardar Técnico

        </button>

        <a href="<?= BASE_URL ?>tecnicos"
           class="btn btn-secondary">

            Cancelar

        </a>

    </form>

</div>