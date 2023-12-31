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

/************** FILTERS **************/

$vehicles = new Vehicles();

// get keywords
$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : NULL;
if ($keywords != NULL) $vehicles->filterByKeywords($keywords);

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
<?php include_once 'includes/header.php' ?>
<main class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <form class="" id="inventorySearchForm" name="inventorySearchForm">
                <div class="form-group">
                    <label for="keywords" class="form-label fw-bold"> Search by Keywords: </label>
                    <div class="input-group">
                        <input type="text" name="keywords" id="keywords" value="<?= $keywords ?>" class="form-control border-primary" placeholder="Search Vehicles">
                        <button class="btn btn-primary" type="button" onclick="changeKeywords()">Search</button>
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
                    <div class="col-2 border rounded shadow-sm m-2 pt-0 px-2 pb-3" role="button" onclick="window.location.href='vehicle.php?id=<?= $row['id'] ?>'">
                        <div class="row">
                            <img src='<?= $row['image_url'] ?: 'images/image-1.jpg' ?>' class="img-fluid pt-2 px-3" style="height: 150px;object-fit: cover;" alt="..." />
                        </div>
                        <small class="text-muted"><?= $row['make'] ?></small>
                        <h6><?= $row['year'] ?> <?= $row['make'] ?> <?= $row['model'] ?></h6>
                        <div class="row">
                            <small class="col text-muted">Color:</small>
                            <small class="col text-muted"><?= $row['color'] ?></small>
                        </div>
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
<?php include_once 'includes/footer.php' ?>