<?php
include_once 'config/db_connect.php';
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
<div class="container-extra mt-5 ">
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
        <select name="location" class="form-select mb-3" id='Locale' value="<?php echo $location ?>">
            <option selected value="Location-Unset">Choose A Location</option>
            <option value="Ketu">Ketu</option>
            <option value="Lekki">Lekki</option>
            <option value="Apapa">Apapa</option>
            <option value="Ikorodu">Ikorodu</option>
            <option value="Victoria-Island">Victoria Island</option>
        </select>

        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control mb-3" disabled id="price">

        <label for="mode" class="form-label">Mode Of Transport</label>
        <input type="text" name="mode" class="form-control mb-3" disabled value="<?php echo htmlspecialchars($_SESSION['mode']) ?>">
        <button class="btn btn-success col-12" type="submit" name="submit">Purchase Ticket</button>
    </form>
</div>
</div>
<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>