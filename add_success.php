<?php
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}

if (isset($_GET['del'])) {
    $del = $_GET['del'];
}
?>
<?php include 'templates/header.php' ?>
<div class="container mt-6 text-center">
    <?php if ($type === 'success') : ?>
        <h1 class="h1 text-success">
            Successful
            <span class="spinner-border ms-2"></span>

            <p>We have sent you a Confirmation Email</p>
        </h1>
        <p>Check Your Tickets: <a href="tickets.php">View Tickets</a></p>
    <?php elseif ($type === 'error') : ?>
        <h1 class="h1 text-success">
            Unsuccessful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Go Back to <a href="home.php">Home</a></p>
    <?php elseif ($del === 'del') : ?>
        <h1 class="h1 text-success">
            Deleting Unsuccessful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Go Back to Check Your <a href="tickets.php">Tickets</a></p>
    <?php elseif ($del === 'AdminDelete') : ?>
        <h1 class="h1 text-success">
            Deleting Unsuccessful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Go Back to Check Your <a href="adminHome.php">Users Tickets</a></p>
    <?php elseif ($del === 'UserDelete') : ?>
        <h1 class="h1 text-success">
            Deleting User Account unsuccessful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Go Back to Check Your <a href="adminUser.php">Your Users</a></p>
    <?php endif; ?>
</div>
<?php include 'templates/footer.php' ?>