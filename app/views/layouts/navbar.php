<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="<?= BASE_URL ?>">

            <img src="<?= BASE_URL ?>img/logo.png" alt="Logo" class="logo me-2" style="height: 40px; width: auto;">

            <i class="bi bi-house-gear-fill me-2"></i>

            ServiceHome Manager

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link"

                       href="<?= BASE_URL ?>">

                        <i class="bi bi-speedometer2"></i>

                        Dashboard

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"

                       href="<?= BASE_URL ?>tecnicos">

                        <i class="bi bi-person-workspace"></i>

                        Técnicos

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"

                       href="<?= BASE_URL ?>servicios">

                        <i class="bi bi-tools"></i>

                        Servicios

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>