<?php
include_once 'config/db_connect.php';
session_start();
if (!$_SESSION['username']) {
    header('Location: index.php');
} else {
    $name = $_SESSION['username'] ?? 'Guest';
    $id = $_SESSION['userId'];
    $sql = "SELECT usersId, usersName, usersEmail, createdAt FROM loginsystem WHERE usersId = $id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}

if (isset($_POST['submit'])) {
    $id_to_delete = $_POST['id_to_delete'];
    $sql = "DELETE FROM loginsystem WHERE usersId = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: success.php?error=Deletefailed');
    }

    mysqli_stmt_bind_param($stmt, 's', $id_to_delete);
    mysqli_stmt_execute($stmt);
    header('Location: success.php?success=AccountDeleted');
}
mysqli_close($conn);


?>
<?php include 'templates/header.php'; ?>
<?php include 'templates/nav.php'; ?>

<section class="container my-5">
    <h4 class="display-5 mb-5">
        Your Account Details:
    </h4>
    <div class="text-center">
        <?php if ($result) : ?>
            <h3 class="display-6 mb-5">
                <?php echo $result['usersName'] ?>
            </h3>
            <p class="lead mb-5">Created Account at: <?php echo date($result['createdAt']) ?></p>
            <p class="lead mb-5">Your Email: <?php echo $result['usersEmail'] ?></p>
            <form action="profile.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $result['usersId'] ?>">
                <button class="btn btn-danger btn-lg" type="submit" name="submit">
                    Delete My Account
                </button>
            </form>
        <?php else : ?>
            <p class="lead">Loading</p>
            <div class="spinner-border"></div>
        <?php endif; ?>
    </div>
</section>

<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>