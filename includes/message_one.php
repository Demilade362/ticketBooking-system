<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .container-extra {
            max-width: 600px;
            margin: 10rem auto;
            text-align: center;
            letter-spacing: 1px;
            border: 1px solid rgba(0, 0, 0, 0.5);
            padding-bottom: 2.5rem;
            border-radius: 10px;
            background: #ffffff;
        }

        .text-primary {
            color: dodgerblue;
        }

        h1 {
            font-size: 50px;
        }

        .btn {
            padding: 20px;
            font-size: 23px;
            background-color: dodgerblue;
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
        }

        .fwt-bold {
            font-weight: bold;
            font-size: 30px;
        }

        .mb-3 {
            margin-bottom: 3rem;
        }

        .bg-light {
            background: #eeeeee;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-extra">
        <h5>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-fill mb-1 text-primary" viewBox="0 0 16 16">
                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13Z" />
            </svg>
            <span class="text-primary">Wyte</span>Mecury
        </h5>
        <h6 class="mb-3">Hello <?php echo $user; ?></h6>
        <p class="mb-3">Your Ticket Has Been Booked. </p>
        <p class="mb-3"> Thank you for Your Patronage.</p>
        <a href="https://www.wytemecury.com.ng/" class="btn btn-primary">View Tickets</a>
    </div>
</body>

</html>