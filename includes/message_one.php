<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <script defer src="../dist/js/bootstrap.min.js"></script>
    <style>
        .container-extra {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-extra bg-white px-2 rounded py-5 shadow-sm mt-5 text-center">
        <h4 class="h4 mb-3">Hello <?php echo $user; ?></h4>
        <p class="mb-3 lead">Your Ticket Has Been Booked. </p>
        <p class="lead mb-3"> Thank you for Your Patronage.</p>
        <a href="#" class="btn btn-primary">Login To View Tickets</a>
    </div>
</body>

</html>