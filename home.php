<?php
include("config/db_connect.php");
session_start();
if (!$_SESSION['username']) {
    header('Location: index.php');
}

$name = $_SESSION['username'] ?? 'Guest';
$id = $_SESSION['userId'];
$sql = "SELECT picture FROM loginsystem WHERE usersId = $id";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
$_SESSION['pp'] = $result['picture'];

?>
<?php include 'templates/header.php'; ?>
<?php include 'templates/nav.php'; ?>
<section class="container mt-3 mb-3">
    <h3 class="display-5">Welcome <?php echo $name; ?></h3>
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-img-header">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/The N700S Shinkansen_ Earthquake-Proof Bullet Train _ JRailPass.jfif" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/406bff9c-2a92-4988-b47e-5ae08487819a.jfif" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="display-5"> Book Train Tickets </h4>
                    <div class="card-content mb-5">
                        <p class="lead"> Book Train Tickets to Anywhere in lagos
                        </p>
                    </div>
                    <?php if ($_SESSION['username']) :  ?>
                        <div>
                            <a href="add.inc.php?mode=Train" class="btn btn-secondary col-12 btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                Book Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-img-header">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/Airbus A380 - Destination's Journey.jfif" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/plane2.jfif" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="display-5">Book Plane Tickets</h4>
                    <div class="card-content mb-5">
                        <p class="lead"> Book Flight Tickets to Anywhere in lagos
                        </p>
                    </div>
                    <?php if ($_SESSION['username']) :  ?>
                        <div>
                            <a href="add.inc.php?mode=Aeroplane" class="btn btn-secondary col-12 btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                Book Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-img-header">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/Boating_ Pet Project.jfif" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/Palm Beach 50.jfif" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="display-5"> Book Boat Tickets </h4>
                    <div class="card-content mb-5">
                        <p class="lead"> Book Boat Tickets to Anywhere in lagos
                        </p>
                    </div>
                    <?php if ($_SESSION['username']) :  ?>
                        <div>
                            <a href="add.inc.php?mode=Boat" class="btn btn-secondary col-12 btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                Book Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-img-header">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/Hodan Bus Services Online Booking, Fares, and Contacts.jfif" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/Call _ 08222 515 0321, BIRO WISATA SEMARANG, BIRO TOUR SEMARANG, BIRO PERJALANAN WISATA DI SEMARANG, SEWA BUS PARIWISATA SEMARANG.jfif" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="display-5">Book Bus Tickets</h4>
                    <div class="card-content mb-5">
                        <p class="lead"> Book Bus (BRT) Tickets to Anywhere in lagos
                        </p>
                    </div>
                    <?php if ($_SESSION['username']) :  ?>
                        <div>
                            <a href="add.inc.php?mode=Bus" class="btn btn-secondary col-12 btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                Book Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>