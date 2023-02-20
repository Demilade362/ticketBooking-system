<?php
$type;

if (isset($_GET['error'])) {
    $type = 'Cannot Delete Account';
}

if (isset($_GET['success'])) {
    $type = 'Account Successfully Deleted';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script defer src="dist/js/bootstrap.min.js"></script>
    <title>Account Status</title>
    <style>
        .display {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5 text-center">
        <h2>Account Status</h2>
        <p><?php echo $type; ?></p>
        <div id="next">
            <?php if ($_GET['success']) : ?>
                <a href="index.php" class="lead">Back</a>
            <?php elseif ($_GET['error']) : ?>
                <a href="profile.php">Back</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>