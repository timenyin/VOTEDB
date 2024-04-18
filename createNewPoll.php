<?php
require_once("includes/db.php");
require_once("includes/Function.php");
require_once("includes/Sessions.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are provided
    if (isset($_POST['polling_unit_number']) && isset($_POST['polling_unit_name']) && isset($_POST['ward_id']) && isset($_POST['lga_id'])) {
        $polling_unit_number = $_POST['polling_unit_number'];
        $polling_unit_name = $_POST['polling_unit_name'];
        $ward_id = $_POST['ward_id'];
        $lga_id = $_POST['lga_id'];
        $polling_unit_description = $_POST['polling_unit_description'] ?? null;
        $lat = $_POST['lat'] ?? null;
        $long = $_POST['long'] ?? null;

        try {
            // SQL query to insert data into the database
            $sql = "INSERT INTO polling_unit (polling_unit_number, polling_unit_name, ward_id, lga_id, polling_unit_description, lat, `long`) 
            VALUES (:polling_unit_number, :polling_unit_name, :ward_id, :lga_id, :polling_unit_description, :lat, :long)";
            $stmt = $conn->prepare($sql);
            // Bind parameters
            $stmt->bindParam(':polling_unit_number', $polling_unit_number);
            $stmt->bindParam(':polling_unit_name', $polling_unit_name);
            $stmt->bindParam(':ward_id', $ward_id);
            $stmt->bindParam(':lga_id', $lga_id);
            $stmt->bindParam(':polling_unit_description', $polling_unit_description);
            $stmt->bindParam(':lat', $lat);
            $stmt->bindParam(':long', $long);
            // Execute the query
            $stmt->execute();
            $_SESSION["SuccessMessage"] = "New polling unit added successfully";
            header("Location: createNewPoll.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION["ErrorMessage"] = "Error: " . $e->getMessage();
            header("Location: createNewPoll.php");
            exit;
        }
    } else {
        $_SESSION["ErrorMessage"] = "All required fields are not provided";
        header("Location: createNewPoll.php");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">

    <!-- Map CSS -->
    <link rel="stylesheet" href="../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/css/libs.bundle.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.bundle.css">

    <!-- Title -->
    <title>VOTEDB - Your Voice Matters</title>
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <?php include('includes/header.php') ?>

    <!-- WELCOME -->
    <section data-jarallax data-speed=".8" class="py-10 py-md-14 overlay overlay-black overlay-60 bg-cover jarallax"
        style="background-image: url(assets/img/covers/cover-13.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h1 class="display-2 text-white">
                        Voting Information
                    </h1>
                    <!-- Text -->
                    <p class="lead text-white text-opacity-75 mb-6">Create New Polling Unit</p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- SHAPE -->
    <div class="position-relative">
        <div class="shape shape-bottom shape-fluid-x text-light">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
            </svg>
        </div>
    </div>

    <!-- APPLYING -->
    <!-- APPLYING -->
    <section class="pt-6 pt-md-8">
        <div class="container pb-8 pb-md-11 border-bottom border-gray-300">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Badge -->
                    <span class="badge rounded-pill text-bg-primary-desat-subtle mb-3">
                        <span class="h6 text-uppercase">New Unit's</span>
                    </span>

                    <!-- Heading -->
                    <h2>
                        Create a <span class="text-primary">New Polling Unit</span>.
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg text-gray-700 mb-7 mb-md-9">
                        Fill the information to get started
                    </p>

                </div>
            </div> <!-- / .row -->

            <div class="row">
                <div class="col-12">
                    <!-- Heading -->
                    <div class="d-flex align-items-center">
                        <h3 class="fw-bold me-3" id="floatingLabels">Floating labels</h1>
                    </div>

                    <!-- Text -->
                    <p class="text-gray-700 mb-5">
                        Make labels floating over inputs as you type.
                    </p>

                    <!-- - display the error / successful  handling message  -->
                    <?php
                    // Display error message if exists
                    echo ErrorMessage();
                    // Display success message if exists
                    echo SuccessMessage();
                    ?>

                    <!-- Card -->
                    <div class="card">
                        <h2 class="card-header">
                            Create a New Polling Uint
                        </h2>
                        <div class="card-body">

                            <form method="post" action="createNewPoll.php">
                                <div class="form-group form-floating">
                                    <input class="form-control" type="text" id="polling_unit_number"
                                        name="polling_unit_number" required>
                                    <label for="polling_unit_number">Polling Unit Number:</label>
                                </div>
                                <div class="form-group form-floating">

                                    <input class="form-control" type="text" id="polling_unit_name"
                                        name="polling_unit_name" required>
                                    <label for="polling_unit_name">Polling Unit Name:</label>
                                </div>
                                <div class="form-group form-floating">

                                    <input class="form-control" type="number" id="ward_id" name="ward_id" required>
                                    <label for="ward_id">Ward ID:</label>
                                </div>
                                <div class="form-group form-floating">

                                    <input class="form-control" type="number" id="lga_id" name="lga_id" required>
                                    <label for="lga_id">LGA ID:</label>
                                </div>
                                <div class="form-group form-floating">

                                    <input class="form-control" id="polling_unit_description"
                                        name="polling_unit_description"></input>
                                    <label for="polling_unit_description">Polling Unit Description:</label>
                                </div>
                                <div class="form-group form-floating">

                                    <input class="form-control" type="text" id="lat" name="lat">
                                    <label for="lat">Latitude:</label>
                                </div>
                                <div class="form-group form-floating">

                                    <input class="form-control" type="text" id="long" name="long">
                                    <label for="long">Longitude:</label>
                                </div>

                                <button class="btn w-100 btn-success lift" type="submit">Submit</button>
                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>
        <!-- / .row -->

        </div>
        <!-- / .container -->
    </section>

    <!-- FOOTER -->
    <?php include('includes/footer.php') ?>

    <!-- JAVASCRIPT -->
    <!-- Vendor JS -->
    <script src="assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.bundle.js"></script>

</body>

</html>