<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Message</title>
    <style>
        .container-extra {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-extra bg-white px-2 rounded py-5 shadow-sm mt-5 text-center">
        <h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-fill mb-1 text-primary" viewBox="0 0 16 16">
                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13Z" />
            </svg>
            <span class="text-primary">We</span>Tic
        </h4>

        <h4 class="h4 mb-3">Hello <?php echo $user ?></h4>
        <p class="mb-3 lead">Your Ticket to <?php echo $locale ?> has been used. </p>
        <p class="mb-3 lead">If Not By You, Reply Us we are here to serve you well</p>
        <p class="lead mb-3"> Thank you for Your Patronage.</p>
        <a href="https://www.wytemecury.com.ng/" class="btn btn-primary">View Remaining Tickets</a>
    </div>
</body>

</html>