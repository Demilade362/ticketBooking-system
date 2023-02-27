<?php
include_once('config/db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysql = "DELETE FROM tickets WHERE Id = '$id'";
    if (mysqli_query($conn, $mysql)) {
        header('Location: usedTickets.php');
        exit();
    } else {
        echo "Error";
    }
}
