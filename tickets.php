<?php
include_once 'config/db_connect.php';

$sql = "SELECT * FROM tickets";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
mysqli_close($conn)

?>

<?php include 'templates/header.php' ?>
<?php include 'templates/nav.php' ?>
<div class="container mt-5">
    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>