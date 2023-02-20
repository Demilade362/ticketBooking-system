<?php
session_start();
if (!$_SESSION['username']) {
    header('Location: index.php');
}
$name = $_SESSION['username'] ?? 'Guest';
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
                    <div>
                        <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
                    </div>
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
                    <div>
                        <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
                    </div>
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
                    <div>
                        <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
                    </div>
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
                    <div>
                        <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>