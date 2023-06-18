<?php

//start session
session_start();

/************** INCLUDES **************/
include_once 'models/User.php';
require_once 'models/Vehicles.php';

/************** USER LOGIC **************/

$user = new User();

// if no user is logged in, redirect to login page
if (!$user->isLoggedIn()) {
    header("location: login.php");
    exit;
}

/************** VEHICLE LOGIC **************/

// id from the URL
$id = isset($_GET['id']) ? $_GET['id'] : NULL;

// if no id, send user back to index.php
if (!$id) {
    header("location: index.php");
    exit;
}

$vehicles = new Vehicles();

$vehiclesResult = $vehicles->getVehicle($id);

// only one vehicle, so go ahead and fetch it now
$vehicle = $vehiclesResult->fetch_array(MYSQLI_ASSOC);

// if no vehicle is found, send user back to index.php
if (!$vehicle) {
    header("location: index.php");
    exit;
}

// many images, so store them in an array
$images = [];
$imagesResult = $vehicles->getImages($id);
while ($image = $imagesResult->fetch_array(MYSQLI_ASSOC)) {
    $images[] = $image['image_url'];
}

if (empty($images)) {
    $images[] = 'images/image-1.jpg';
    $images[] = 'images/image-2.jpg';
    $images[] = 'images/image-3.jpg';
}

// many features, so store them in an array
$features = [];
$featuresResult = $vehicles->getFeatures($id);
while ($feature = $featuresResult->fetch_array(MYSQLI_ASSOC)) {
    $features[] = $feature['description'];
}

if (empty($features)) {
    $features[] = 'No features available';
}

?>

<?php include_once 'includes/header.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h1><?= $vehicle['year'] ?> <?= $vehicle['make'] ?> <?= $vehicle['model'] ?> </h1>
        </div>
    </div>
    <div class="row bg-light">
        <div class="container bg-light w-75">
            <div class="row">
                <div class="col float-left">
                    <a href="/index.php" class="text-decoration-none">
                        <h6>Back to Inventory</h6>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-7 p-3">
                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <?php foreach ($images as $key => $image_url) { ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" <?= $key === array_key_first($images) ? "class='active'" : '' ?> <?= $key === array_key_first($images) ? "aria-current='true'" : '' ?> aria-label="..."></button>
                                <?php } ?>
                            </div>
                            <div class="carousel-inner">
                                <?php foreach ($images as $key => $image_url) { ?>
                                    <div class="carousel-item <?= $key === array_key_first($images) ? 'active' : '' ?>">
                                        <img class="d-block w-100" src="<?= $image_url ?>" alt="...">
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                    <div class="container">
                        <h2 class="pt-4">
                            <span style="font-weight: 100;">
                                Options &amp; Features
                            </span>
                        </h2>
                        <div class="row">
                            <div class="col-12 bg-body p-4">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <?php foreach ($features as $feature) { ?>
                                            <tr>
                                                <td class='pt-3'>
                                                    <h6> <?= $feature ?> </h6>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 p-3">
                    <div class="row bg-body p-4">
                        <h2 class="my-3 font-weight-bold">Vehicle Details</h2>
                        <div class="row">
                            <div class="col">Color:</div>
                            <div class="col"><?= $vehicle['color'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Condition:</div>
                            <div class="col"><?= $vehicle['car_condition'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Retail Price:</div>
                            <div class="col">$<?= number_format($vehicle['mileage'], 2) ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Stock #:</div>
                            <div class="col"><?= substr($vehicle['vin'], 0, 7) ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Mileage:</div>
                            <div class="col"><?= number_format($vehicle['mileage']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php' ?>