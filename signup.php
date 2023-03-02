<?php
include_once 'config/db_connect.php';
$username = $password = $email = $confirmPassword =  '';
$error = ['username' => '', 'password' => '', 'email' => '', 'confirmPassword' => '', 'Equal' => ''];

if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $error['username'] = 'Provide Username';
    } else {
        $username = $_POST['username'];
        if (!preg_match('/^[a-zA-Z0-9\s]*$/', $username)) {
            $error['username'] = 'Username Must Only Contain Letters And Numbers No Special Chars';
        }
    }

    if (empty($_POST['email'])) {
        $error['email'] = 'Provide Your Email';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Provide A Valid Email Please';
        }
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Provide your Password';
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 6) {
            $error['password'] = 'Strengthen Your Password';
        }
    }

    if (empty($_POST['confirmPassword'])) {
        $error['confirmPassword'] = 'Confirm Your Password';
    } else {
        $confirmPassword = $_POST['confirmPassword'];
    }

    if ($_POST['password'] !== $_POST['confirmPassword']) {
        $error['Equal'] = "Password Don't Match";
    }


    if (array_filter($error)) {
    } else {
        setcookie('code', mt_rand(10000, 99999), time() + 20);
        $to = $email;
        $subject = "One Time Verification Code";


        $headers = array(
            "MIME-version" => '1.0',
            'Content-Type' => 'text/html; charset=UTF-8',
            "From" => ' admin@wytemecury.com.ng',
            'Reply-to' => "admin@wytemecury.com.ng"
        );

        $user = $username;

        ob_start();
        include('otp_message.php');
        $message = ob_get_contents();
        ob_get_clean();


        $send = mail($to, $subject, $message, $headers);

        if ($send) {
            $sql = 'INSERT INTO loginsystem(usersName, usersEmail, usersPwd) VALUES(?, ?, ?);';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                $error['Equal'] = 'Something Went Wrong';
            }

            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $passwordHashed);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            header('Location: otp.php');
        } else {
            $error['Equal'] = "Error Unable to send confirmation Email";
        }
    }
}
?>

<?php include 'templates/header.php' ?>
<div class="container mt-6">
    <div class="row align-items-center justify-content-around">
        <div class="col-lg-3 text-center d-none d-lg-block">
            <div class="display-1">
                <span class="text-primary">We</span>Tic
            </div>
            <p class="lead">Booking AnyMinutes, Time and Place</p>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="display-1 d-lg-none mb-2 text-center">
                <span class="text-primary">We</span>Tic
            </div>
            <div <?php if ($error['username'] && $error['email'] && $error['password'] && $error['confirmPassword']) : ?>>
                <div class="alert alert-danger">
                    <?php echo 'Provide all Information' ?>
                </div>
            </div>
            <div <?php elseif ($error['username']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['username']; ?>
                </div>
            </div>
            <div <?php elseif ($error['email']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['email']; ?>
                </div>
            </div>
            <div <?php elseif ($error['password']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['password'] ?>
                </div>
            </div>
            <div <?php elseif ($error['confirmPassword']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['confirmPassword'] ?>
                </div>
            </div>
            <div <?php elseif ($error['Equal']) : ?>>
                <div class="alert alert-danger">
                    <?php echo $error['Equal'] ?>
                </div>
            </div <?php endif; ?>>

            <div <?php if ($username && $email && $password && $confirmPassword && !$error['Equal']) : ?>>
                <div class="alert alert-success">
                    <?php echo 'SignUp Successful'; ?>
                    <span class="spinner-border spinner-border-sm ms-1"></span>
                </div>
            </div <?php endif; ?>>
            <form action="signup.php" method="POST">
                <input type="text" name="username" class="form-control mb-3 form-control-lg" placeholder="Your Username" value="<?php echo $username ?>">
                <input type="email" name="email" class="form-control mb-3 form-control-lg" placeholder="Your Email" value="<?php echo $email ?>">
                <input type="password" name="password" class="form-control mb-3 form-control-lg" placeholder="Your Password" value="<?php echo $password ?>">
                <input type="password" name="confirmPassword" class="form-control mb-3 form-control-lg" placeholder="Confirm Your Password" value="<?php echo $confirmPassword ?>">
                <input type="submit" name="submit" value="Create My Account" class="btn btn-secondary btn-lg col-12">
                <p class="mt-3 lead">I have An Account <a href="index.php" class="text-decoration-none">Login to Account.</a></p>
            </form>
        </div>
    </div>
</div>
<?php include 'templates/footer.php' ?>