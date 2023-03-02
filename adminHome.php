<?php
include('config/db_connect.php');
session_start();
$name = $_SESSION['adminName'] ?? 'Guest';

$sql = "SELECT * FROM tickets";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel WyteMecury</title>
    <link rel="shortcut icon" href="templates/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script defer src="dist/popper.min.js"></script>
    <script defer src="dist/js/bootstrap.min.js"></script>


    <style>
        #side {
            height: 100vh;
            position: fixed;
            z-index: 1;
        }

        #second {
            margin-left: 10rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 bg-primary shadow-sm" id="side">
                <ul class="nav flex-column" style="margin-top: 7rem;">
                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-light mb-5 mx-auto"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a href="adminUser.php" class="nav-link mb-5 mx-auto text-light"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a href="usedTickets.php" class="nav-link mx-auto text-light"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                            </svg></a>
                    </li>

                    <li class="nav-item mx-auto" style="margin-top: 20rem;">
                        <a href="adminProfile.php" class="btn btn-light">
                            <img src="image/user-solid.svg" width="30" height="30" alt="Profile Picture" class="rounded-circle">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-10" id="second">
                <nav class="navbar navbar-expand-lg bg-white auto-hiding-navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-fill mb-1 text-primary" viewBox="0 0 16 16">
                                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13Z" />
                            </svg>

                            <span class="text-primary">Wyte</span>Mecury Admin
                        </div>
                        <div class="collapse navbar-collapse">
                            <div class="mx-auto search-form" style="width: 50%;">
                                <form action="search.php" method="get" class="d-lg-flex">
                                    <input type="search" class="form-control rounded-pill" placeholder="Search Username" id="search" name="searchTicket">
                                    <button type="submit" class="btn btn-outline-success ms-2" name="search">Search</button>
                                </form>
                            </div>
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a href="includes/LogoutAdmin.inc.php" class="btn btn-secondary">Logout <?php echo $_SESSION['adminName'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="mt-5">
                    <h1 class="h1 mb-5">Hello <?php echo $_SESSION['adminName'] ?></h1>
                    <table class="table bg-white">
                        <thead>
                            <tr>
                                <th scope="col">Tickets Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mode of Transport</th>
                                <th scope="col">Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $result) : ?>
                                <tr>
                                    <th scope="row"><?php echo $result['ticketID'] ?></th>
                                    <td id="username"><?php echo $result['usersname'] ?></td>
                                    <td><?php echo $result['usersemail'] ?></td>
                                    <td><?php echo $result['mode'] ?></td>
                                    <td><?php echo $result['localePlace'] ?></td>
                                    <td>
                                        <form action="usedTickets.php" method="POST">
                                            <input type="hidden" name="myId" value="<?php echo $result['id'] ?>">
                                            <input type="hidden" name="ticketId" value="<?php echo $result['ticketID'] ?>">
                                            <input type="hidden" name="usersname" value="<?php echo $result['usersname'] ?>">
                                            <input type="hidden" name="usersemail" value="<?php echo $result['usersemail'] ?>">
                                            <input type="hidden" name="mode" value="<?php echo $result['mode'] ?>">
                                            <input type="hidden" name="location" value="<?php echo $result['localePlace'] ?>">
                                            <button class="btn btn-success" name="useTic" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                                                </svg>
                                                Use</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>