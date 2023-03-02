<?php
include_once 'config/db_connect.php';
session_start();
$userId = $_SESSION['userId'];
$sql = "SELECT * FROM tickets WHERE usersId = $userId";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $Id = $_POST['myId'];
    $mysql = "DELETE FROM tickets WHERE id = $Id";
    if (mysqli_query($conn, $mysql)) {
        header('Location: tickets.php');
    } else {
        header('Location: add_success.php?del=NotDelete');
    }
}

mysqli_close($conn)

?>

<?php include 'templates/header.php' ?>
<?php include 'templates/nav.php' ?>
<div class="container mt-5">
    <table class="table bg-white shadow-sm d-none d-lg-block">
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
                            <button class="btn btn-danger" name="submit" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                                Delete Ticket</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<div class="d-md-block d-lg-none">
    <?php foreach ($results as $result) : ?>
        <div class="card shadow-sm text-center mb-2 pb-0">
            <div class="card-header">
                <?php echo $result['ticketID'] ?>
            </div>
            <div class="card-content pt-4">
                <h4><?php echo $result['usersname'] ?></h4>
                <p><?php echo $result['usersemail'] ?></p>
                <p><?php echo $result['mode'] ?></p>
                <p><?php echo $result['localePlace'] ?></p>

                <form action="tickets.php" method="POST">
                    <input type="hidden" name="myId" value="<?php echo $result['id'] ?>">
                    <button class="btn btn-danger" name="submit" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                        Delete Ticket</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<section class="fixed-bottom bg-primary shadow-sm mt-5 d-lg-none">
    <ul class="nav d-flex justify-content-between p-3">
        <li class="nav-item">
            <a href="home.php" class="nav-link text-light  mx-auto"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg></a>
        </li>
        <li class="nav-item">
            <a href="Report.php" class="nav-link mx-auto text-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a href="tickets.php" class="nav-link mx-auto btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                </svg></a>
        </li>
    </ul>
</section>
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>