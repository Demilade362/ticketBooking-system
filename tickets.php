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
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>