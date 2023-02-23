<?php
session_start();
$name = $_SESSION['adminName'] ?? 'Guest'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Wetic</title>
</head>

<body>
    <h1>Hello <?php echo $name ?></h1>
</body>

</html>