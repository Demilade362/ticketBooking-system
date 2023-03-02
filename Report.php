<?php
session_start();
if (isset($_POST['submit'])) {

    $to = "admin@wytemecury.com.ng";
    $subject = "Report A Problem";


    $header = array(
        "From" => $_POST['email'],
        'Reply-to' => "admin@wytemecury.com.ng"
    );

    $message = $_POST['msg'];

    $send = mail($to, $subject, $message, $headers);

    echo $send ? 'Mail is Sent' : 'We have A problem';
}

?>

<?php include 'templates/header.php' ?>
<?php include 'templates/nav.php' ?>
<section class="container-extra shadow-sm bg-white mt-5 p-3 shadow-sm" style="margin-bottom: 10rem;">
    <form action="Report.php" method="POST">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control mb-3" name="email">

        <label for="msg" class="form-label">Your Message</label>
        <textarea name="msg" class="form-control mb-3" cols="30" rows="10"></textarea>

        <button class="btn btn-success col-12" type="submit" name="submit">
            Report a Problem
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill ms-2" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
            </svg>
        </button>
    </form>
</section>
<section class="fixed-bottom bg-primary shadow-sm mt-5 d-lg-none">
    <ul class="nav d-flex justify-content-between p-3">
        <li class="nav-item">
            <a href="home.php" class="nav-link text-light text-center mx-auto"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="Report.php" class="nav-link mx-auto text-center btn btn-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                </svg>
                <p>Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="tickets.php" class="nav-link mx-auto text-center text-light"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                </svg>
                <p>Tickets</p>
            </a>
        </li>
    </ul>
</section>
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>