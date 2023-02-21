<?php
$username = $email = $location = $price = $accountNo =  '';
$error = ['username' => '', 'email' => '', 'location' => '', 'accountNo' => '', 'price' => ''];

if (isset($_POST['submit'])) {

    if (empty($_POST['username'])) {
        $error['username'] = 'Provide Your Username';
    } else {
        $username = $_POST['username'];
    }

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

    if (empty($_POST['price'])) {
        $error['price'] = 'Price is Empty select or reselect your location';
    } else {
        $price = $_POST['price'];
        if ($price === '0') {
            $error['price'] = 'Choose A locale';
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

    if (array_filter($error)) {
    } else {
    }
}
