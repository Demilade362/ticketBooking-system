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
            Booking Successful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Check Your Tickets: <a href="tickets.php">View Tickets</a></p>
    <?php elseif ($type === 'error') : ?>
        <h1 class="h1 text-success">
            Booking Unsuccessful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Go Back to <a href="home.php">Home</a></p>
    <?php elseif ($del === 'del') : ?>
        <h1 class="h1 text-success">
            Deleting Ticket Unsuccessful
            <span class="spinner-border ms-2"></span>
        </h1>
        <p>Go Back to Check Your <a href="tickets.php">Tickets</a></p>
    <?php endif; ?>
</div>
<?php include 'templates/footer.php' ?>