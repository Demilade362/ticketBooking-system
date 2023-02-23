<?php
include_once 'config/db_connect.php';


session_start();
if (!$_SESSION['username']) {
    header('Location: index.php');
} else {
    $name = $_SESSION['username'] ?? 'Guest';
    $id = $_SESSION['userId'];
    $sql = "SELECT usersId, usersName, picture, usersEmail, createdAt FROM loginsystem WHERE usersId = $id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}
$_SESSION['pp'] = $result['picture'];
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

<section class="container-extra bg-white p-5 shadow-sm my-5">
    <div class="d-lg-flex justify-content-between mb-4">
        <?php if ($result) : ?>
            <?php if ($result['picture']) : ?>
                <img class="rounded-circle" src="image/<?php echo $_SESSION['pp']; ?>" height="200" width="200" alt="">
            <?php else : ?>
                <img src="templates/user-solid.svg" height="200" width="200" alt="">
            <?php endif; ?>
            <h4 class="h4">
                @<?php echo $result['usersName'] ?>
            </h4>
        <?php endif; ?>
    </div>
    <div class="text-start">
        <?php if ($result) : ?>
            <h5 class="text-decoration-underline">Account Information</h5>
            <p class="fwt-bold h6 mb-3">Created Account at: <?php echo date($result['createdAt']) ?></p>
            <p class="h6 mb-5 fwt-bold">Your Email: <?php echo $result['usersEmail'] ?></p>
            <div class="d-lg-flex justify-content-around">
                <button class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2">
                    Delete My Account
                </button>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    Edit Profile
                </button>
            </div>
        <?php else : ?>
            <p class="lead">Loading</p>
            <div class="spinner-border"></div>
        <?php endif; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade shadow" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Your Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="uploads.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php if ($result) : ?>
                            <label for="username" class="form-label">Username: </label>
                            <input type="text" name="username" class="form-control mb-3" value="<?php echo $_SESSION['username'] ?>">


                            <label for="email" class="form-label">Email: </label>
                            <input type="text" name="useremail" value="<?php echo $_SESSION['userEmail'] ?>" class="form-control mb-3">

                            <label for="profilePic" class="form-label">Choose a Photo: </label>
                            <input type="file" name="profilePic" class="form-control mb-3">
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary col-12" type="submit" name="update" data-bs-dismiss="modal" aria-label="Close">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade shadow" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Delete Your Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="h5">Did you Want to Really Delete Your Account?</p>
                    <h6><?php echo $_SESSION['username'] ?></h6>
                    <form action="profile.php" method="POST">
                        <input type="hidden" name="id_to_delete" value="<?php echo $result['usersId'] ?>">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger col-12 " type="submit" name="submit">
                        Confirm Deletion
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>