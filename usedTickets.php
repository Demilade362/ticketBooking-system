<?php
include_once('config/db_connect.php');
session_start();

if (isset($_POST['useTic'])) {
    $iD = $_POST['myId'];
    $ticketsId = $_POST['ticketId'];
    $username = $_POST['usersname'];
    $mode = $_POST['mode'];
    $location = $_POST['location'];

    $sql = "INSERT INTO usedtickets(usedTic, ticketID, usersName, mode, locale) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Error " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $iD, $ticketsId, $username, $mode, $location);
    if(mysqli_stmt_execute($stmt)){
        $to = $_POST['usersemail'];
        $subject = "Tickets Has Been Used";


        $header = array(
            "MIME-version" => '1.0',
            'Content-Type' => 'text/html;charset=UTF-8',
            "From" => 'ademolademilade362@gmail.com',
            'Reply-to' => "ademolademilade362@gmail.com"
        );

        $user = $_POST['usersname'];
        $locale = $_POST['location'];
        ob_start();
        include('message_two.php');
        $message = ob_get_contents();
        ob_get_clean();

        $send = mail($to, $subject, $message, $headers);

        echo $send ? 'Mail is Sent' : 'We have A problem';
    }
    header('Location: delete.php?id=' . $iD);
}


$mysql = "SELECT * FROM usedTickets";
$query = mysqli_query($conn, $mysql);
$results_two = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['delete'])) {
    $id = $_POST['myId'];
    $mysql = "DELETE FROM usedTickets WHERE Id = $id";
    if (mysqli_query($conn, $mysql)) {
        header('Location: usedTickets.php');
    } else {
        echo "Error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wetic Used Tickets</title>
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
                        <a href="adminHome.php" class="nav-link mb-5 mx-auto text-light"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a href="adminUser.php" class="nav-link mb-5 mx-auto text-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-light mx-auto ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                            </svg>
                        </a>
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
                        <div class="navbar-brand">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-fill mb-1 text-primary" viewBox="0 0 16 16">
                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13Z" />
            </svg>

                            <span class="text-primary">We</span>Tic Admin</div>
                        <div class="collapse navbar-collapse">
                            <div class="mx-auto search-form" style="width: 50%;">
                                <form action="search.php" method="get" class="d-lg-flex">
                                    <input type="search" class="form-control rounded-pill" placeholder="Search Username" id="search" name="searchUsedTicket">
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
                            <?php foreach ($results_two as $result) : ?>
                                <tr>
                                    <th scope="row"><?php echo $result['ticketID'] ?></th>
                                    <td id="username"><?php echo $result['usersName'] ?></td>
                                    <td><?php echo $result['mode'] ?></td>
                                    <td><?php echo $result['locale'] ?></td>
                                    <td>
                                        <form action="usedTickets.php" method="POST">
                                            <input type="hidden" name="myId" value="<?php echo $result['Id'] ?>">
                                            <button class="btn btn-danger" name="delete" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                </svg>
                                                Delete Used Tickets</button>
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