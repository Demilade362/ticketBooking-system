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
    $_SESSION['pp'] = $result['picture'];
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

<section class="container-extra bg-white p-5 shadow-sm my-5">
    <div class="d-lg-flex justify-content-between mb-4">
        <?php if ($result) : ?>
            <?php if ($_SESSION['pp']) : ?>
                <img class="rounded-circle" src="image/<?php echo $_SESSION['pp']; ?>" height="250" width="250" alt="Profile Picture">
            <?php elseif (!$_SESSION['pp']) : ?>
                <img src="templates/user-solid.svg" height="200" width="200" alt="Profile Picture">
            <?php else : ?>
                <img src="templates/user-solid.svg" height="200" width="200" alt="Profile Picture">
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
            <div class="d-lg-flex justify-content-between">
                <button class="btn btn-danger btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                    </svg>
                    Delete My Account
                </button>
                <button type="button" class="btn btn-primary btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                    Edit Profile
                </button>
            </div>
        <?php else : ?>
            <p class="lead">Loading</p>
            <div class="spinner-border"></div>
        <?php endif; ?>
         <?php if (isset($_SESSION['username'])) : ?>
            <a href="./includes/logout.inc.php" class="btn btn-danger btn-lg col-12 text-white text-center d-lg-none">LOGOUT</a>
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
<section class="fixed-bottom bg-primary shadow-sm mt-5 d-lg-none">
    <ul class="nav d-flex justify-content-between p-3">
        <li class="nav-item">
            <a href="home.php" class="nav-link text-light mx-auto"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg></a>
        </li>
        <li class="nav-item">
            <a href="Report.php" class="nav-link mx-auto text-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a href="tickets.php" class="nav-link mx-auto text-light"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                </svg></a>
        </li>
    </ul>
</section>

<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>