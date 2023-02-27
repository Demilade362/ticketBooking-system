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
<div class="container-extra bg-white shadow-sm mt-5 p-3">
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

        <label for="account" class="form-label">Account Number</label>
        <input type="number" name="accountNo" value="<?php echo "$accountNo" ?>" class="form-control mb-3">

        <label for="Location" class="form-label">Location</label>
        <select name="location" class="form-select mb-3" id='Location' value="<?php echo $location ?>">
            <option selected value="Location-Unset">Choose A Location</option>
            <option value="Ketu - N700">Ketu - N700</option>
            <option value="Lekki - N2000">Lekki - N2000</option>
            <option value="Apapa - N4000">Apapa - N4000</option>
            <option value="Ikorodu - N500">Ikorodu - N500</option>
            <option value="Victoria-Island - N2000">Victoria Island - N2000</option>
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
<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>