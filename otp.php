<?php
session_start();
$otpError = array('otp-error' => '');

if (isset($_SESSION['code'])) {
    if (isset($_POST['submit'])) {
        if (empty($_POST['one_time'])) {
            $otpError['otp-error'] = "Enter Otp Code";
        } else {
            if ($_SESSION['code'] == $_POST['one_time']) {
                header("Location: index.php");
            } else {
                $otpError['otp-error'] = "Invalid Code Enter";
            }
        }
    }
} else {
    $otpError['otp-error'] =  "One time Password has Expired";
}


?>

<?php include "templates/header.php" ?>
<section class="bg-white shadow-sm container-extra p-3" style="margin-top: 17rem;">
    <?php if ($otpError['otp-error']) : ?>
        <div class=" alert alert-danger">
            <?php echo $otpError['otp-error']; ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <input type="text" class="form-control mb-3" placeholder="Enter OTP" name="one_time">
        <button class="btn btn-secondary col-12" name="submit" type="submit">Verify Code</button>
    </form>
</section>
<?php include "templates/footer.php" ?>