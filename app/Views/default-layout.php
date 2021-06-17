<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Institute Name</title>

    <!-- CSS only -->
    <link href="/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="/animate.4.1.1.min.css" />
    <link rel="stylesheet" href="/styles.1.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand">Institute Name</a>

            <?php
            $auth = \Config\Services::auth();
            if ($auth->isLoggedIn()) :
            ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/students">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/applicationform">Application Form</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/reports/daily">Daily</a></li>
                                <li><a class="dropdown-item" href="/reports/monthly">Monthly</a></li>
                                <li><a class="dropdown-item" href="/reports/yearly">Yearly</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/reports/import">Import</a></li>
                                <li><a class="dropdown-item" href="/reports/export">Export</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/account/signout">Signout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            <?php endif; ?>

        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <footer></footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="/modules.1.js"></script>
    <script src="/loader.1.js"></script>
</body>

</html>