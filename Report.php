<?php include 'templates/header.php' ?>
<?php include 'templates/nav.php' ?>
<section class="container-extra shadow-sm bg-white mt-5 p-3 shadow-sm">
    <form action="Report.php" method="POST">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control mb-3" name="email">

        <label for="msg" class="form-label">Your Message</label>
        <textarea name="msg" class="form-control mb-3" cols="30" rows="10"></textarea>

        <button class="btn btn-primary col-12" type="submit" name="submit">Report a Problem</button>
    </form>
</section>
<?php include 'templates/navfooter.php' ?>
<?php include 'templates/footer.php' ?>