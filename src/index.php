<?php
//start session
session_start();

/************** INCLUDES **************/
include_once 'User.php';
require_once 'Vehicles.php';

/************** USER LOGIC **************/

$user = new User();

// if no user is logged in, redirect to login page
if (!$user->isLoggedIn()) {
    header("location: login.php");
    exit;
}

/************** FILTERS **************/

$vehicles = new Vehicles();

// get condition 
$condition = isset($_GET['condition']) ? $_GET['condition'] : NULL;
if ($condition == 'Any') $condition = NULL;
if ($condition != NULL) $vehicles->filterByCondition($condition);

// get year
$year = isset($_GET['year']) ? $_GET['year'] : NULL;
if ($year == 'Any') $year = NULL;
if ($year != NULL) $vehicles->filterByYear($year);

// get make
$make = isset($_GET['make']) ? $_GET['make'] : NULL;
if ($make == 'Any') $make = NULL;

// get model if make is set
$models = NULL;
if ($make != NULL) {
    $vehicles->filterByMake($make);

    // get model
    $model = isset($_GET['model']) ? $_GET['model'] : NULL;
    if ($model == 'Any') $model = NULL;
    if ($model != NULL) $vehicles->filterByModel($model);
}

// get color
$color = isset($_GET['color']) ? $_GET['color'] : NULL;
if ($color == 'Any') $color = NULL;

if ($color != NULL) {
    $vehicles->filterByColor($color);
}

/************** PAGE DATA **************/

// get conditions 
$conditions = $vehicles->getConditions();

// get years
$years = $vehicles->getYears();

// get models
$models = $vehicles->getModels();

// get colors of vehicles 
$colors = $vehicles->getColors();

// get makes 
$makes = $vehicles->getMakes();

// get # of all vehicles for display purposes
$vehiclesCount = $vehicles->getCount();

/************** PAGINATION **************/

// page number
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// results per page
$resultsPerPage = isset($_GET['resultsPerPage']) ? $_GET['resultsPerPage'] : 25;

// if results per page is set to 'All', set results per page to the total # of vehicles
if ($resultsPerPage == 'All') $resultsPerPage = $vehiclesCount;

// get # of pages for pagination
$numberPages = ceil($vehiclesCount / $resultsPerPage);

// get number of results for the last page of results
$resultsOnLastPage = $vehiclesCount % $resultsPerPage;

// limit offset
$offset = ($page * $resultsPerPage) - $resultsPerPage;


/************** RESULTS **************/

// finally, get vehicles
$result = $vehicles->getAll($offset, $resultsPerPage);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <style>
        .vehicle-container {
            width: 260px;
        }
    </style>
    <script src="js/functions.js"></script>
</head>

<body>
    <div class="bg-primary w-100 d-flex justify-content-center">
        <div class=" d-flex justify-content-between w-75">
            <a class="text-white" target="_blank" href="https://maps.google.com/?q=1900 Congress Parkway South, Athens, TN, 37303"><i class="fa fa-map-marker p-2"></i>1900 Congress Parkway South • Athens, TN 37303</a>
            <a class="text-white" href="tel:(423) 745-1962" data-bb-processed="true"><i class="fa fa-phone p-2"></i>(423) 745-1962</a>
            <div class="d-inline text-white">
                <i class="fa fa-clock-o p-2"></i>
                Today's Hours: 9:00am - 7:00pm
            </div>
            <div class="d-inline text-white">
                <i class="fa fa-comment p-2"></i>Se habla Español
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light bg-light px-4 py-3">
        <span class="navbar-brand mb-0 h1">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</span>
        <div>
            <a href="reset-password.php" class="btn btn-secondary">Reset Your Password</a>
            <a href="logout.php" class="btn btn-dark ml-3">Sign Out of Your Account</a>
        </div>
    </nav>
    <main class="container-fluid">
        <div class="row w-full">
            <div class="d-flex justify-content-center px-5 mx-auto">
                <a href="#" class="py-3 px-5">
                    <img src="https://longofathens.com/site-images/dealers/0/banners/700CreditBanner3.png" alt="700 Credit Banner" class="w-100">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-4">
                <form class="" id="inventorySearchForm" name="inventorySearchForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="keywords" class="form-label fw-bold"> Search by Keywords: </label>
                        <div class="input-group">
                            <input type="text" name="keywords" id="keywords" value="" class="form-control border-primary" placeholder="Search Vehicles">
                            <button class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                    <label for="description" class="form-label fw-bold pt-3"> Search by Filters: </label>
                    <div class="form-group">
                        <label for="condition" class="text-muted">Condition:</label>
                        <select id="condition" class="form-control" onchange="changeCondition(this)">
                            <option <?= $condition ? 'selected' : '' ?>>Any</option>
                            <?php while ($row = $conditions->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?= $row['car_condition'] ?>" <?= $condition == $row['car_condition'] ? 'selected' : '' ?>><?= $row['car_condition'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="year" class="pt-2 text-muted">Year:</label>
                        <select id="year" class="form-control" onchange="changeYear(this)">
                            <option <?= $year ? 'selected' : '' ?>>Any</option>
                            <?php while ($row = $years->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?= $row['year'] ?>" <?= $year == $row['year'] ? 'selected' : '' ?>><?= $row['year'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="make" class="pt-2 text-muted">Make:</label>
                        <select id="make" class="form-control" onchange="changeMake(this)">
                            <option <?= $make ? 'selected' : '' ?>>Any</option>
                            <?php while ($row = $makes->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?= $row['make'] ?>" <?= $make == $row['make'] ? 'selected' : '' ?>><?= $row['make'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="model" class="pt-2 text-muted">Model:</label>
                        <select id="model" class="form-control" onchange="changeModel(this)" <?= $make == NULL ? 'disabled' : '' ?>>
                            <option selected><?= $make == NULL ? 'Please Select a Make' : 'Any' ?></option>
                            <?php if ($models) {
                                while ($row = $models->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?= $row['model'] ?>" <?= $model == $row['model'] ? 'selected' : '' ?>><?= $row['model'] ?></option>
                            <?php }
                            } ?>
                        </select>
                        <label for="color" class="pt-2 text-muted">Color:</label>
                        <select id="color" class="form-control" onchange="changeColor(this)">
                            <option selected>Any</option>
                            <?php while ($row = $colors->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?= $row['color'] ?>" <?= $color == $row['color'] ? 'selected' : '' ?>><?= $row['color'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="price" class="pt-3 text-muted">Price Range:</label>
                        <input type="range" class="form-range" id="price" min="1000" max="50000">
                        <label for="color" class="pt-2 text-muted">Mileage:</label>
                        <input type="range" class="form-range" id="price" min="1000" max="50000">
                        <button type="button" class="btn btn-outline-secondary w-100 mt-3" onclick="resetFilters()">Reset Filters</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-10 col-md-6">
                <div class="d-flex justify-content-between">
                    <div>Showing <?= $offset + 1 ?> - <?= $offset + ($page == $numberPages ? $resultsOnLastPage : $resultsPerPage) ?> of <?= $vehiclesCount ?></div>
                    <div class="">
                        <label for="resultsPerPage" class="form-label">Results Per Page:</label>
                        <select id="resultsPerPage" class="form-select" aria-label="Default select example" onchange="changeResultsPerPage(this)">
                            <?php foreach ([25, 50, 100, 'All'] as $limit) { ?>
                                <option value="<?= $limit ?>" <?= $limit == $resultsPerPage ? 'selected' : '' ?>><?= $limit ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>"><a role="button" class="page-link" onclick="changePage(<?= $page - 1 ?>)"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php for ($i = 1; $i <= $numberPages; $i++) { ?>
                                <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a role="button" class="page-link" onclick="changePage(<?= $i ?>)"><?= $i ?></a></li>
                            <?php } ?>
                            <li class="page-item <?= $page == $numberPages ? 'disabled' : '' ?>"><a role="button" class="page-link" onclick="changePage(<?= $page + 1 ?>)"><span aria-hidden="true">&raquo;</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex flex-wrap overflow-scroll">
                    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                        <div class="col-2 border rounded shadow-sm m-2 pt-0 px-2 pb-3">
                            <img src='images/image-1.jpg' class="img-fluid" alt="..." />
                            <small class="text-muted"><?= $row['make'] ?></small>
                            <h6><?= $row['year'] ?> <?= $row['make'] ?> <?= $row['model'] ?></h6>
                            <div class="row">
                                <small class="col text-muted">Condition:</small>
                                <small class="col text-muted"><?= $row['car_condition'] ?></small>
                            </div>
                            <div class="row">
                                <small class="col text-muted">Retail Price:</small>
                                <small class="col text-muted">$<?= number_format($row['mileage'], 2) ?></small>
                            </div>
                            <div class="row">
                                <small class="col text-muted">Stock #:</small>
                                <small class="col text-muted"><?= substr($row['vin'], 0, 7) ?></small>
                            </div>
                            <div class="row">
                                <small class="col text-muted">Mileage:</small>
                                <small class="col text-muted"><?= number_format($row['mileage']) ?></small>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>