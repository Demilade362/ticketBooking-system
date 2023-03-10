<?php
include_once 'config/db_connect.php';
$username = $password =  '';
$error = ['username' => '', 'password' => '', 'error' => ''];
$noError = array('noError' => '');

if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $error['username'] = 'Provide Username';
    } else {
        $username = trim($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Provide your Password';
    } else {
        $password = trim($_POST['password']);
    }


    if (array_filter($error)) {
    } else {
        function fetchUsers($conn, $username, $password)
        {
            $sql = 'SELECT * FROM adminsystem WHERE AdminName = ?';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                $error['error'] = 'Login Failed';
            }

            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                $pwdHashed = $row['AdminPassword'];
                $checkedPwd = password_verify($password, $pwdHashed);
                if ($username === $row['AdminName'] && $checkedPwd === true) {
                    session_start();

                    $_SESSION['adminName'] = $row['AdminName'];
                    $_SESSION['adminId'] = $row['AdminID'];
                    return true;
                }

                if (!$username === $row['AdminName'] && $checkedPwd === false) {
                    return false;
                }
                if (!$username === $row['AdminName']) {
                    return false;
                }
                if ($checkedPwd === false) {
                    return false;
                }
            }
        }

        if (fetchUsers($conn, $username, $password) === true) {
            header('Location: adminHome.php');
        } elseif (fetchUsers($conn, $username, $password) !== true) {
            $error['error'] = 'Login Failed Check if Username or Password Is correct';
        } else {
            $noError['noError'] = 'Login Successful';
        }
    }
}

?>
<?php include 'templates/header.php' ?>
<div class="container mt-6">
    <div class="row align-items-center justify-content-around">
        <div class="col-lg-4 text-center d-none d-lg-block">
            <div class="display-4">
                <span class="text-primary">Wyte</span>Mecury Admin
            </div>
            <p class="lead">Booking AnyMinutes, Time and Place</p>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="display-1 d-lg-none mb-2 text-center">
                <span class="text-primary">We</span>Tic
            </div>
            <div <?php if ($error['username'] && $error['password']) : ?>>
                <div class="alert alert-danger">
                    <?php echo 'Provide Both Username and Password' ?>
                </div>
            </div>
            <div <?php elseif ($error['username']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['username']; ?>
                </div>
            </div>
            <div <?php elseif ($error['password']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['password'] ?>
                </div>
            </div>
            <div <?php elseif ($error['error']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['error'] ?>
                </div>
                <div <?php elseif ($noError['noError']) : ?>>
                    <div class="alert alert-success">
                        <?php echo $noError['noError'] ?>
                    </div>
                </div <?php endif; ?>>

                <form action="admin.php" method="POST">
                    <input type="text" name="username" class="form-control mb-3 form-control-lg" placeholder="Your Username" value='<?php echo $username; ?>'>
                    <input type="password" name="password" class="form-control mb-3 form-control-lg" placeholder="Your Password" value="<?php echo $password; ?>">
                    <input type="submit" name="submit" value="Login Admin" class="btn btn-secondary btn-lg col-12">
                </form>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php' ?>