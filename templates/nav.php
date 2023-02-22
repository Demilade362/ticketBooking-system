<nav class="navbar navbar-expand-lg auto-hiding-navbar py-3 px-3 navbar-light shadow-sm bg-white sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <span class="text-primary">We</span>Tic
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="home.php" class="nav-link active">
                        HOME
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tickets.php" class="nav-link active">
                        VIEW TICKETS
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link active">
                        REPORT A PROBLEM
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a href="./profile.php" class="btn mx-auto me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a href="./includes/logout.inc.php" class="btn btn-secondary nav-link text-white mx-auto mt-lg-1">LOGOUT</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>