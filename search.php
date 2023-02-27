<?php
include('config/db_connect.php');
session_start();
$name = $_SESSION['adminName'] ?? 'Guest';

$resultsTickets = null;
$resultsUser = null;
$resultsUsedTickets = null;
$searchTickets = null;
$searchUser = null;
$searchUser = null;

if (isset($_GET['search']) &&  isset($_GET['searchTicket'])) {
    $searchTickets = $_GET['searchTicket'];
    $sql = "SELECT * FROM tickets WHERE usersname = '$searchTickets'";
    $query = mysqli_query($conn, $sql);
    $resultsTickets = mysqli_fetch_assoc($query);
}

if (isset($_GET['searchUser'])  && isset($_GET['user'])) {
    $searchUser = $_GET['user'];
    $sql = "SELECT * FROM loginsystem WHERE usersName = '$searchUser'";
    $query = mysqli_query($conn, $sql);
    $resultsUser = mysqli_fetch_assoc($query);
}

if (isset($_GET['searchUsedTicket']) && isset($_GET['searchUsedTicket'])) {
    $searchUser = $_GET['searchUsedTicket'];
    $sql = "SELECT * FROM usedTickets WHERE usersName = '$searchUser'";
    $query = mysqli_query($conn, $sql);
    $resultsUsedTickets = mysqli_fetch_assoc($query);
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
        <div class="d-lg-flex justify-content-between">
            <h3>Hello <?php echo $name ?></h3>
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
                                    <form action="usedTickets.php" method="POST">
                                        <input type="hidden" name="myId" value="<?php echo $resultsTickets['id'] ?>">
                                        <input type="hidden" name="ticketId" value="<?php echo $resultsTickets['ticketID'] ?>">
                                        <input type="hidden" name="usersname" value="<?php echo $resultsTickets['usersname'] ?>">
                                        <input type="hidden" name="usersemail" value="<?php echo $resultsTickets['usersemail'] ?>">
                                        <input type="hidden" name="mode" value="<?php echo $resultsTickets['mode'] ?>">
                                        <input type="hidden" name="location" value="<?php echo $resultsTickets['localePlace'] ?>">
                                        <button class="btn btn-success" name="useTic" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                                            </svg>
                                            Use</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="adminHome.php" class="btn btn-primary">Back to Homepage</a>
                    </div>
                <?php elseif (!$resultsTickets) : ?>
                    <div class="text-center">
                        <div>
                            <p class="lead">Record Not Found
                                <span class="spinner-border spinner-border-sm"></span>
                            </p>
                        </div>
                        <a href="adminHome.php" class="btn btn-primary">Back to Homepage</a>
                    </div>
                <?php elseif ($resultsUser) : ?>
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
                                    <form action="adminUser.php" method="POST">
                                        <input type="hidden" name="myId" value="<?php echo $resultsUser['usersId'] ?>">
                                        <button class="btn btn-danger" name="submit" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                            Delete User Account </button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="adminUser.php" class="btn btn-primary">Back to Users Page</a>
                    </div>
                <?php elseif (!$resultsUser) : ?>
                    <div class="text-center">
                        <div>
                            <p class="lead">Record Not Found
                                <span class="spinner-border spinner-border-sm"></span>
                            </p>
                        </div>
                        <a href="adminUser.php" class="btn btn-primary">Back to Homepage</a>
                    </div>
                <?php elseif ($resultsUsedTickets) : ?>
                    <table class="table bg-white">
                        <thead>
                            <tr>
                                <th scope="col">User Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Mode</th>
                                <th scope="col">Location</th>
                                <th scope="col">Used At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $resultsUsedTickets['ticketID'] ?></th>
                                <td><?php echo $resultsUsedTickets['usersName'] ?></td>
                                <td><?php echo $resultsUsedTickets['mode'] ?></td>
                                <td><?php echo $resultsUsedTickets['locale'] ?></td>
                                <td><?php echo $resultsUsedTickets['UsedAt'] ?></td>
                                <td>
                                    <form action="usedTickets.php" method="POST">
                                        <input type="hidden" name="myId" value="<?php echo $resultsUsedTickets['Id'] ?>">
                                        <button class="btn btn-danger" name="delete" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                            Delete Used Ticket </button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="usedTickets.php" class="btn btn-primary">Back to Tickets Page</a>
                    </div>
                <?php elseif (!$resultsUsedTickets) : ?>
                    <div class="text-center">
                        <div>
                            <p class="lead">Record Not Found
                                <span class="spinner-border spinner-border-sm"></span>
                            </p>
                        </div>
                        <a href="usedTickets.php" class="btn btn-primary">Back to Homepage</a>
                    </div>
                <?php endif ?>
                </div>
        </div>

</body>

</html>