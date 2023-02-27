<?php
include("config/db_connect.php");
$email = $location = $price = $accountNo = '';

$error = ['email' => '', 'location' => '', 'accountNo' => ''];

$userId = $_SESSION['userId'];
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $error['email'] = 'Provide Your Email';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Provide A Valid Email Please';
        }
    }

    if (empty($_POST['location'])) {
        $error['location'] = 'You did not Choose Any Location';
    } else {
        $location = $_POST['location'];
        if ($location === 'Location-Unset') {
            $error['location'] = 'You did not Choose Any Location';
        }
    }

    if (empty($_POST['accountNo'])) {
        $error['accountNo'] = 'Add your Account Number for Payment';
    } else {
        $accountNo = $_POST['accountNo'];
        if (strlen($accountNo) < 11) {
            $error['accountNo'] = "This Account Number isn't complete";
        }
    }

    if (!($error['email'] || $error['location'] || $error['accountNo'])) {
        $ticketId = uniqid('', true);
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $userId = mysqli_real_escape_string($conn, $_SESSION['userId']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $accountNo = mysqli_real_escape_string($conn, $_POST['accountNo']);
        $mode = mysqli_real_escape_string($conn, $_SESSION['mode']);


        $sql = "INSERT INTO tickets(usersname, usersId, usersemail, localePlace, accountNo, ticketID, mode) VAlUES('$username', '$userId', '$email', '$location', '$accountNo', '$ticketId', '$mode')";
        if (mysqli_query($conn, $sql)) {
            header('Location: add_success.php?type=success');

            $to = $email;
            $subject = "Booking Tickets Completed";


            $header = array(
                "MIME-version" => '1.0',
                'Content-Type' => 'text/html;charset=UTF-8',
                "From" => 'ademolademilade362@gmail.com',
                'Reply-to' => "ademolademilade362@gmail.com"
            );

            $user = $_SESSION['username'];
            ob_start();

            include('message_one.php');
            $message = ob_get_contents();
            ob_get_clean();

            exit();

            $send = mail($to, $subject, $message, $headers);

            echo $send ? 'Mail is Sent' : 'We have A problem';
        } else {
            header('Location: add_success.php?type=error');
            echo 'Connection Error: ' . mysqli_error($conn);
        }
    }
}
