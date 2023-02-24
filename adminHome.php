<?php
include('config/db_connect.php');
session_start();
$name = $_SESSION['adminName'] ?? 'Guest';
$sql = "SELECT * FROM tickets";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $Id = $_POST['myId'];
    $mysql = "DELETE FROM tickets WHERE id = $Id";
    if (mysqli_query($conn, $mysql)) {
        header('Location: adminHome.php.php');
    } else {
        header('Location: add_success.php?del=NotDelete');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Wetic</title>
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
            <div class="col-1 bg-white shadow" id="side">
                <ul class="nav flex-column" style="margin-top: 11rem;">
                    <li class="nav-item">
                        <a href="#" class="nav-link active mb-3">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mb-3">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mb-3">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Used Ticket</a>
                    </li>
                </ul>
            </div>
            <div class="col-10" id="second">
                <nav class="navbar navbar-expand-lg bg-white auto-hiding-navbar">
                    <div class="container">
                        <div class="navbar-brand"><span class="text-primary">We</span>Tic Admin</div>
                        <div class="collapse navbar-collapse">
                            <div class="mx-auto search-form" style="width: 50%;">
                                <input type="search" class="form-control rounded-pill" placeholder="Search Ticket">
                            </div>
                            <ul class="navbar-nav">
                                <li class="nav-item mx-2">
                                    <a href="#" class="btn">
                                        <img src="image/user-solid.svg" width="30" height="30" alt="Profile Picture" class="rounded-circle">
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="btn btn-secondary">Logout <?php echo $_SESSION['adminName'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="mt-5">
                    <table class="table bg-white shadow-sm">
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
                                    <td><?php echo $result['usersname'] ?></td>
                                    <td><?php echo $result['usersemail'] ?></td>
                                    <td><?php echo $result['mode'] ?></td>
                                    <td><?php echo $result['localePlace'] ?></td>
                                    <td>
                                        <form action="tickets.php" method="POST">
                                            <input type="hidden" name="myId" value="<?php echo $result['id'] ?>">
                                            <button class="btn btn-danger" name="submit" type="submit">Delete </button>
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