<?php
include('config/db_connect.php');
session_start();
$name = $_SESSION['adminName'] ?? 'Guest';

$resultsTickets = null;
$resultsUser = null;
if (isset($_GET['search'])) {
    $searchTickets = $_GET['searchTicket'];
    $sql = "SELECT * FROM tickets WHERE usersname = '$searchTickets'";
    $query = mysqli_query($conn, $sql);
    $resultsTickets = mysqli_fetch_assoc($query);
}

if (isset($_GET['searchUser'])) {
    $searchUser = $_GET['user'];
    $sql = "SELECT * FROM loginsystem WHERE usersName = '$searchUser'";
    $query = mysqli_query($conn, $sql);
    $resultsUser = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script defer src="dist/popper.min.js"></script>
    <script defer src="dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="d-lg-flex">
            <h3>Hello <?php $_SESSION['adminName'] ?></h3>
            <h3>Search Query</h3>
        </div>
        <div class="mt-5">
            <?php if ($resultsTickets) : ?>
                <div class="mt-5">
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
                            <tr>
                                <th scope="row"><?php echo $resultsTickets['ticketID'] ?></th>
                                <td id="username"><?php echo $resultsTickets['usersname'] ?></td>
                                <td><?php echo $resultsTickets['usersemail'] ?></td>
                                <td><?php echo $resultsTickets['mode'] ?></td>
                                <td><?php echo $resultsTickets['localePlace'] ?></td>
                                <td>
                                    <form action="adminHome.php" method="POST">
                                        <input type="hidden" name="myId" value="<?php echo $resultsTickets['id'] ?>">
                                        <button class="btn btn-success" name="submit" type="submit">Use</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="adminHome.php" method="POST">
                                        <input type="hidden" name="myId" value="<?php echo $resultsTickets['id'] ?>">
                                        <button class="btn btn-danger" name="submit" type="submit">Delete </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif ?>
                <?php if ($resultsUser) : ?>
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
                            <tr>
                                <th scope="row"><?php echo $resultsUser['usersId'] ?></th>
                                <td><?php echo $resultsUser['usersName'] ?></td>
                                <td><?php echo $resultsUser['usersEmail'] ?></td>
                                <td><?php echo $resultsUser['createdAt'] ?></td>
                                <td>
                                    <form action="adminHome.php" method="POST">
                                        <input type="hidden" name="myId" value="<?php echo $resultsUser['usersId'] ?>">
                                        <button class="btn btn-danger" name="submit" type="submit">Delete User Account </button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                <?php endif ?>
                </div>
        </div>

</body>

</html>