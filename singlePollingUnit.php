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
    <section data-jarallax data-speed=".8" class="py-10 py-md-14 overlay overlay-black overlay-60 bg-cover jarallax"
        style="background-image: url(assets/img/covers/cover-4.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h1 class="display-2 text-white">
                        Voting Information
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
    <section class="pt-6 pt-md-8">
        <div class="container pb-8 pb-md-11 border-bottom border-gray-300">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Badge -->
                    <span class="badge rounded-pill text-bg-primary-desat-subtle mb-3">
                        <span class="h6 text-uppercase">Individual Votes Section</span>
                    </span>

                    <!-- Heading -->
                    <h2>
                        View the <span class="text-primary">Results Summary</span>.
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg text-gray-700 mb-7 mb-md-9">
                        Summary of Votes for the Polling Unit
                    </p>

                </div>
            </div> <!-- / .row -->

            <div class="row align-items-center mb-5">
                <div class="col">

                    <!-- Heading -->
                    <h4 class="fw-bold mb-1">
                        SHOWING THE INDIVIDUAL POLL UNITS
                    </h4>

                    <!-- Text -->
                    <p class="fs-sm text-body-secondary mb-0">
                        User Details form the DataBase
                    </p>


                </div>
                <div class="col-auto">
                    <?php
                    $polling_unit_id = 8;
                    ?>
                    <!-- Badge -->
                    <span class="badge rounded-pill text-bg-success-subtle">
                        <span class="h6 text-uppercase">specific polling unit
                            number:<?php echo htmlentities($polling_unit_id) ?> </span>
                    </span>
                </div>
            </div> <!-- / .row -->
            <div class="row">
                <div class="col-12">

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
                                            PARTY SCORE party_score
                                        </span>
                                    </th>
                                    <th>
                                        <span class="h6 text-uppercase fw-bold">
                                            SUBMITTED BY
                                        </span>
                                    </th>
                                </tr>

                                <?php
                                // Fetch results for a specific polling unit (e.g., polling_unit_uniqueid = 8)
                                $SrNo = 0;
                                $polling_unit_id = 8;
                                global $conn;
                                $sql = "SELECT party_abbreviation, party_score, entered_by_user FROM announced_pu_results WHERE polling_unit_uniqueid = $polling_unit_id";
                                $stmt = $conn->query($sql);
                                while ($DataRows = $stmt->fetch()) {
                                    $party_abbreviation  = $DataRows["party_abbreviation"];
                                    $party_score = $DataRows["party_score"];
                                    $entered_by_user = $DataRows["entered_by_user"];
                                    $SrNo++;
                                ?>

                            </thead>
                            <tbody>
                                <tr>

                                    <td>

                                        <a href="career-single.html" class="text-reset text-decoration-none">
                                            <p class="fs-sm mb-0">
                                                <?php echo htmlentities($SrNo++); ?>
                                            </p>
                                        </a>

                                    </td>
                                    <td>

                                        <a href="career-single.html" class="text-reset text-decoration-none">
                                            <p class="mb-1">
                                                <?php echo htmlentities($party_abbreviation); ?>
                                            </p>
                                            <p class="fs-sm text-body-secondary mb-0">
                                                Responsible for design systems and brand management.
                                            </p>
                                        </a>

                                    </td>
                                    <td>

                                        <a href="career-single.html" class="text-reset text-decoration-none">
                                            <p class="fs-sm mb-0">
                                                <?php echo htmlentities($party_score); ?>
                                            </p>
                                        </a>

                                    </td>
                                    <td>

                                        <a href="career-single.html" class="text-reset text-decoration-none">
                                            <p class="fs-sm mb-0">
                                                <?php echo htmlentities($entered_by_user); ?>
                                            </p>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
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