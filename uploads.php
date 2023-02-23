<?php
session_start();
include("config/db_connect.php");
$username = $email = $profilePic = '';
$errors = array('username' => '', 'email' => '', 'profilePic' => '', 'usualError' => '');

if (isset($_POST['update'])) {

    if (empty($_SESSION['username'])) {
        $errors['username'] = 'Username is Empty';
    } else {
        $username = $_SESSION['username'];
    }

    if (empty($_SESSION['userEmail'])) {
        $errors['email'] = 'Provide your Email';
    } else {
        $email = $_SESSION['userEmail'];
    }

    if (empty($_FILES['profilePic'])) {
        $errors['profilePic'] = 'Choose your Profile Pic';
    } else {
        $profilePic = $_FILES['profilePic'];
    }

    if (!($errors['username'] || $errors['email'] || $errors['profilePic'])) {

        if (isset($_FILES['profilePic']['name'])) {
            $file_name = $_FILES['profilePic']['name'];
            $filePATH = $_FILES['profilePic']['full_path'];
            $fileTmpName = $_FILES['profilePic']['tmp_name'];
            $error = $_FILES['profilePic']['error'];

            if ($error === 0) {
                $img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exist = array('jpg', 'jpeg', 'png', 'svg');
                if (in_array($img_ex_to_lc, $allowed_exist)) {
                    $new_image_name = uniqid($username, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = 'image/' . $new_image_name;

                    move_uploaded_file($fileTmpName, $img_upload_path);

                    $usersname = mysqli_real_escape_string($conn, $_SESSION['username']);
                    $email = mysqli_real_escape_string($conn, $_SESSION['userEmail']);

                    //moving to database
                    $ID =  $_SESSION['userId'];
                    $sql = "UPDATE loginsystem  SET usersName = '$username', usersEmail = '$email',  picture = '$new_image_name' WHERE usersId = $ID";

                    if (mysqli_query($conn, $sql)) {
                        header('Location: profile.php');
                    } else {
                        $error['usualError'] = "Connection Error can't upload";
                    }
                } else {
                    $errors['usualError'] = "You can't Upload Any other type of file except jpg, jpeg, png";
                }
            } else {
                $errors['usualError'] = "Unknown Error Occurred";
            }
        } else {
            $errors['profilePic'] = "Couldn't Upload Your Image";
        }
    }
}

?>

<?php include('templates/header.php') ?>
<section class='container-extra'>
    <?php if ($errors['usualError']) : ?>
        <div class="alert alert-danger">
            <?php echo $errors['usualError'] ?>
        </div>
    <?php elseif ($errors['username']) : ?>
        <div class="alert alert-danger">
            <?php echo $errors['username'] ?>
        </div>
    <?php elseif ($errors['email']) : ?>
        <div class="alert alert-danger">
            <?php echo $errors['email'] ?>
        </div>
    <?php elseif ($errors['profilePic']) : ?>
        <div class="alert alert-danger">
            <?php echo $errors['profilePic'] ?>
        </div>
    <?php endif ?>
    <div class="display-6">
        Uploading....
        <span class="ms-2 spinner-border"></span>
    </div>
</section>
<?php include('templates/footer.php') ?>