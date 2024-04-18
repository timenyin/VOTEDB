<?php require_once("includes/db.php"); ?>

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
    <section data-jarallax data-speed=".8" class="py-10 py-md-14 overlay overlay-black overlay-60 bg-cover jarallax" style="background-image: url(assets/img/covers/cover-5.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h1 class="display-2 text-white">
                        Welcome to Party Polling Unit Management
                    </h1>
                    <!-- Text -->
                    <p class="lead text-white text-opacity-75 mb-6">Details of Specific Polling Unit</p>

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
                        <span class="h6 text-uppercase">View Total Votes</span>
                    </span>

                    <!-- Heading -->
                    <h2>
                        Let’s find you an the <span class="text-primary">Total Votes </span>.
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg text-gray-700 mb-7 mb-md-9">
                        Get Total Votes from a specific LGA
                    </p>

                </div>
            </div> <!-- / .row -->

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <form class="mb-7 mb-md-9" method="post">
                        <div class="row align-items-end">
                            <div class="col-12 col-md-8">
                                <div class="form-group mb-5 mb-md-0">
                                    <!-- Label -->
                                    <label class="form-label" for="applyRoles">Select LGA</label>
                                    <!-- Select -->
                                    <select class="form-select" id="applyRoles" name="selectedLGA">
                                        <?php
                                        // Check if the form is submitted
                                        $selectedLGA = isset($_POST['selectedLGA']) ? $_POST['selectedLGA'] : '';

                                        // Query to fetch LGA names starting with "U" in alphabetical order
                                        $sql = "SELECT lga_name FROM lga WHERE lga_name LIKE 'U%' ORDER BY lga_name ASC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();

                                        // Fetch all matching LGA names and store them in an array
                                        $lgaNamesU = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                        // Move the selected LGA name to the beginning of the array if it exists
                                        if (!empty($selectedLGA) && !in_array($selectedLGA, $lgaNamesU)) {
                                            array_unshift($lgaNamesU, $selectedLGA);
                                        }

                                        // Display each LGA name starting with "U" as an option in the select dropdown
                                        foreach ($lgaNamesU as $lgaName) {
                                            echo '<option value="' . $lgaName . '">' . $lgaName . '</option>';
                                        }

                                        // Query to fetch LGA names NOT starting with "U" in alphabetical order
                                        $sql = "SELECT lga_name FROM lga WHERE lga_name NOT LIKE 'U%' ORDER BY lga_name ASC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();

                                        // Fetch all other LGA names and store them in an array
                                        $lgaNamesOthers = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                        // Move the selected LGA name to the beginning of the array if it exists
                                        if (!empty($selectedLGA) && !in_array($selectedLGA, $lgaNamesOthers)) {
                                            array_unshift($lgaNamesOthers, $selectedLGA);
                                        }

                                        // Display each other LGA name as an option in the select dropdown
                                        foreach ($lgaNamesOthers as $lgaName) {
                                            echo '<option value="' . $lgaName . '">' . $lgaName . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div> <!-- / .row -->
                    </form>

                    <!-- Table -->
                    <div class="table-responsive mb-7 mb-md-9">
                        <table class="table table-align-middle">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="h6 text-uppercase fw-bold">
                                            S/N
                                        </span>
                                    </th>
                                    <th>
                                        <span class="h6 text-uppercase fw-bold">
                                            PARTY ABBREVIATION
                                        </span>
                                    </th>
                                    <th>
                                        <span class="h6 text-uppercase fw-bold">
                                            TOTAL SCORE
                                        </span>
                                    </th>
                                    <th>
                                        <span class="h6 text-uppercase fw-bold">
                                            LGA NAME
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if the form is submitted
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Get the selected LGA from the form
                                    $selectedLGA = $_POST['selectedLGA'];

                                    // Display data for the selected LGA
                                    displayLGAData($selectedLGA, $conn);
                                }

                                // Function to fetch and display the total scores for each party within a specific LGA
                                function displayLGAData($lgaName, $conn)
                                {
                                    try {
                                        // SQL query to select and sum the party scores for a specific LGA
                                        $sql = "SELECT party_abbreviation, SUM(party_score) AS total_score 
                                            FROM announced_pu_results
                                            WHERE polling_unit_uniqueid = (SELECT lga_id FROM lga WHERE lga_name = :lgaName)
                                            GROUP BY party_abbreviation";

                                        // Prepare the SQL statement
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindParam(':lgaName', $lgaName);
                                        $stmt->execute();

                                        // Initialize serial number
                                        $sn = 1;

                                        // Initialize total score for LGA
                                        $totalLgaScore = 0;

                                        // Display the LGA data
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<tr>';
                                            echo '<td>' . $sn++ . '</td>';
                                            echo '<td>' . $row['party_abbreviation'] . '</td>';
                                            echo '<td>' . $row['total_score'] . '</td>';
                                            echo '<td>' . $lgaName . '</td>';
                                            echo '</tr>';

                                            // Increment total score for LGA
                                            $totalLgaScore += $row['total_score'];
                                        }

                                        // Display the total score for LGA
                                        echo '<tr>';
                                        echo '<td colspan="2"></td>'; // Empty columns for alignment
                                        echo '<td class="fw-bold  rounded-pill text-bg-success-subtle">' . $totalLgaScore . '</td>';
                                        echo '<td></td>'; // Empty column for alignment
                                        echo '</tr>';
                                    } catch (PDOException $e) {
                                        // Handle errors
                                        echo "Error: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div> <!-- / .row -->

            <!-- / .row -->
        </div> <!-- / .container -->
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