<?php
include_once 'config/db_connect.php';

$sql = "SELECT AdminId, AdminName, Picture, createdAt FROM adminsystem WHERE AdminId = 1";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

mysqli_close($conn);
?>
<?php include 'templates/header.php'; ?>

<section class="container-extra bg-white p-5 shadow-sm my-5">
    <div class="d-lg-flex justify-content-between mb-4">
        <?php if ($result) : ?>
            <img src="templates/user-solid.svg" height="200" width="200" />
            <h4 class="h4">
                @<?php echo $result['AdminName'] ?>
            </h4>
        <?php endif; ?>
    </div>
    <div class="text-start">
        <?php if ($result) : ?>
            <h5 class="text-decoration-underline">Account Information</h5>
            <p class="fwt-bold h6 mb-3">Created Account at: <?php echo date($result['createdAt']) ?></p>
            <p class="h6 mb-5 fwt-bold">Admin Username: <?php echo $result['AdminName'] ?></p>
            <a href="adminHome.php" class="btn btn-primary">Back to Panel</a>

        <?php else : ?>
            <p class="lead">Loading</p>
            <div class="spinner-border"></div>
        <?php endif; ?>
    </div>
</section>

<?php include 'templates/footer.php'; ?>