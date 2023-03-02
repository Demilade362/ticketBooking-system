<nav class="navbar navbar-expand-md auto-hiding-navbar py-3 px-3 navbar-light shadow-sm bg-white sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-fill mb-1 text-primary" viewBox="0 0 16 16">
                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13Z" />
            </svg>
            <span class="text-primary">Wyte</span>Mecury
        </a>

        <ul class="navbar-nav ms-auto d-lg-none d-md-block d-sm-block" id="d-none">
            <?php if (isset($_SESSION['username'])) : ?>
                <?php if (isset($_SESSION['pp'])) : ?>
                    <li class="nav-item">
                        <a href="./profile.php" class="btn mx-auto me-3">
                            <img src="image/<?php echo $_SESSION['pp'] ?>" alt="Profile Picture" width="40" height="40" class=" rounded-circle">
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="./profile.php" class="btn mx-auto me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
            <?php else : ?>
                <li class="nav-item">
                    <a href="./profile.php" class="btn mx-auto me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="collapse navbar-collapse d-md-none d-sm-none d-lg-block" id="navmenu">
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
                    <a href="Report.php" class="nav-link active">
                        REPORT A PROBLEM
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['username'])) : ?>
                    <?php if (isset($_SESSION['pp'])) : ?>
                        <li class="nav-item">
                            <a href="./profile.php" class="btn mx-auto me-3">
                                <img src="image/<?php echo $_SESSION['pp'] ?>" alt="Profile Picture" width="40" height="40" class=" rounded-circle">
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="./profile.php" class="btn mx-auto me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php else : ?>
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
                        <a href="./includes/logout.inc.php" class="btn btn-danger nav-link text-white mx-auto mt-lg-1">LOGOUT</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>