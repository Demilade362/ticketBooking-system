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
                            <button class="btn btn-danger" name="submit" type="submit">Delete Ticket</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>