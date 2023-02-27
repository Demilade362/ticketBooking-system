<?php
session_start();

?>

<?php include 'templates/header.php' ?>
<?php include 'templates/nav.php' ?>
<section class="container-extra shadow-sm bg-white mt-5 p-3 shadow-sm">
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
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>