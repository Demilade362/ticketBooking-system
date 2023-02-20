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
                    <?php if ($_SESSION['username']) :  ?>
                        <div>
                            <a href="#" class="btn btn-secondary col-12 btn-lg" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Book Now</a>
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
                            <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
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
                            <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
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
                            <a href="#" class="btn btn-secondary col-12 btn-lg">Book Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Book Train Tickets</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="modal-body">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" class="form-control mb-3" disabled>

                        <label for="username" class="form-label">Email</label>
                        <input type="text" name="username" value="<?php echo $_SESSION['userEmail'] ?>" class="form-control mb-3">

                        <label for="Location" class="form-label">Location</label>
                        <select name="location" class="form-select mb-3">
                            <option selected value="Location-Unset">Choose A Location</option>
                            <option value="Ketu">Ketu</option>
                            <option value="Lekki">Lekki</option>
                            <option value="Apapa">Apapa</option>
                            <option value="Ikorodu">Ikorodu</option>
                            <option value="Victoria-Island">Victoria Island</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success col-12" type="submit" name="submit" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Purchase Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'templates/navfooter.php'; ?>
<?php include 'templates/footer.php'; ?>