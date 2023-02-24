<?php
include('config/db_connect.php');
session_start();
$name = $_SESSION['adminName'] ?? 'Guest';
$sql = "SELECT * FROM loginsystem";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $Id = $_POST['myId'];
    $mysql = "DELETE FROM loginsystem WHERE id = $Id";
    if (mysqli_query($conn, $mysql)) {
        header('Location: adminHome.php.php');
    } else {
        header('Location: add_success.php?del=UserDelete');
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
            <div class="col-1 bg-primary shadow-sm" id="side">
                <ul class="nav flex-column" style="margin-top: 7rem;">
                    <li class="nav-item">
                        <a href="adminHome.php" class="nav-link text-light  mb-5 mx-auto">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mb-5 mx-auto btn btn-light">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mx-auto text-light">Used Ticket</a>
                    </li>

                    <li class="nav-item mx-auto" style="margin-top: 20rem;">
                        <a href="#" class="btn btn-light">
                            <img src="image/user-solid.svg" width="30" height="30" alt="Profile Picture" class="rounded-circle">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-10" id="second">
                <nav class="navbar navbar-expand-lg bg-white auto-hiding-navbar">
                    <div class="container">
                        <div class="navbar-brand"><span class="text-primary">We</span>Tic Admin</div>
                        <div class="collapse navbar-collapse">
                            <div class="mx-auto search-form" style="width: 50%;">
                                <form action="search.php" method="get" class="d-lg-flex ">
                                    <input type="search" class="form-control rounded-pill" placeholder="Search Username" id="search" name="user">
                                    <button type="submit" class="btn btn-outline-success ms-2" name="searchUser">Search</button>
                                </form>
                            </div>
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a href="#" class="btn btn-secondary">Logout <?php echo $_SESSION['adminName'] ?></a>
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
                                <th scope="col">User Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $result) : ?>
                                <tr>
                                    <th scope="row"><?php echo $result['usersId'] ?></th>
                                    <td><?php echo $result['usersName'] ?></td>
                                    <td><?php echo $result['usersEmail'] ?></td>
                                    <td><?php echo $result['createdAt'] ?></td>
                                    <td>
                                        <form action="adminHome.php" method="POST">
                                            <input type="hidden" name="myId" value="<?php echo $result['usersId'] ?>">
                                            <button class="btn btn-danger" name="submit" type="submit">Delete User Account </button>
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
    <script src="js/script.js"></script>
</body>

</html>