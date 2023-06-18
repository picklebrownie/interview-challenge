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

    <div class="row w-full">
        <div class="d-flex justify-content-center px-5 mx-auto">
            <a href="#" class="py-3 px-5">
                <img src="https://longofathens.com/site-images/dealers/0/banners/700CreditBanner3.png" alt="700 Credit Banner" class="w-100">
            </a>
        </div>
    </div>