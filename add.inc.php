<?php
session_start();
if (!$_SESSION['username']) {
    header('Location: index.php');
}
$name = $_SESSION['username'] ?? 'Guest';

if (isset($_GET["mode"])) {
    $_SESSION['mode'] = $_GET['mode'];
}
?>
<?php include 'includes/validation.php' ?>
<?php include 'templates/header.php'; ?>
<?php include 'templates/nav.php'; ?>
<div class="container-extra bg-white shadow-sm mt-5 p-3" style="margin-bottom: 6rem;">
    <?php if ($error['email']) : ?>
        <div class="alert alert-danger">
            <?php echo $error['email'] ?>
        </div>
    <?php elseif ($error['accountNo']) : ?>
        <div class="alert alert-danger">
            <?php echo $error['accountNo'] ?>
        </div>
    <?php elseif ($error['location']) : ?>
        <div class="alert alert-danger">
            <?php echo $error['location'] ?>
        </div>
    <?php endif; ?>
    <form action="add.inc.php" method="POST">
        <div class="h4 text-end">
            Book <?php echo htmlspecialchars($_SESSION['mode']); ?> Tickets
        </div>
        <label for="username" class="form-label">Username</label>
        <input type="email" name="username" value="<?php echo htmlspecialchars($_SESSION['username']) ?>" class="form-control mb-3" disabled>

        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" value="<?php echo  htmlspecialchars($_SESSION['userEmail']) ?>" class="form-control mb-3">

        <label for="account" class="form-label">Credit Card Number</label>
        <input type="number" name="accountNo" value="<?php echo "$accountNo" ?>" class="form-control mb-3">

        <label for="Location" class="form-label">Location</label>
        <select name="location" class="form-select mb-3" id='Location' value="<?php echo $location ?>">
            <option selected value="Location-Unset">Choose A Location</option>
            <option value="Ketu - &#8358;700">Ketu - &#8358;700</option>
            <option value="Lekki - &#8358;2000">Lekki - &#8358;2000</option>
            <option value="Apapa - &#8358;4000">Apapa - &#8358;4000</option>
            <option value="Ikorodu - &#8358;500">Ikorodu - &#8358;500</option>
            <option value="Victoria-Island - &#8358;2000">Victoria Island - &#8358;2000</option>
            <option value="Kano - &#8358;150000">Kano - &#8358;150000</option>
            <option value="Abuja - &#8358;120000">Abuja - &#8358;120000</option>
            <option value="Bornu - &#8358;124000">Bornu - &#8358;124000</option>
        </select>

        <label for="mode" class="form-label">Mode Of Transport</label>
        <input type="text" name="mode" class="form-control mb-3" disabled value="<?php echo htmlspecialchars($_SESSION['mode']) ?>">
        <button class="btn btn-success col-12" name="submit" type="submit">
            Purchase Ticket
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill ms-1" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
            </svg>
        </button>
    </form>
</div>
</div>
<section class="fixed-bottom bg-primary shadow-sm mt-5 d-lg-none">
    <ul class="nav d-flex justify-content-between p-3">
        <li class="nav-item">
            <a href="home.php" class="nav-link btn btn-light  mx-auto"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg></a>
        </li>
        <li class="nav-item">
            <a href="Report.php" class="nav-link mx-auto text-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                </svg>
            </a>
        </li>
        <li class="nav-item">
            <a href="tickets.php" class="nav-link mx-auto text-light"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                </svg></a>
        </li>
    </ul>
</section>
<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>