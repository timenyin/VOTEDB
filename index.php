<?php require_once("includes/db.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <section class="pt-4 pt-md-11">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">

                    <!-- Image -->
                    <img src="assets/img/illustrations/illustration-6.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0" alt="..." data-aos="fade-up" data-aos-delay="100">

                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1" data-aos="fade-up">

                    <!-- Heading -->
                    <h1 class="display-3 text-center text-md-start">
                        Welcome to <span class="text-primary">VOTEDB</span>. <br>
                        Database System
                    </h1>

                    <!-- Text -->
                    <p class="lead text-center text-md-start text-body-secondary mb-6 mb-lg-8">
                        Empowering Your Local Government, Make Your Voice Heard in Your Community
                    </p>

                    <!-- Buttons -->
                    <div class="text-center text-md-start">
                        <a href="createNewPoll.php" class="btn btn-primary shadow lift me-1">
                            Create Unit <i class="fe fe-arrow-right d-none d-md-inline ms-3"></i>
                        </a>
                        <a href="totalResult.php" class="btn btn-primary-subtle lift">
                            See Total Result
                        </a>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>


    <!-- FEATURES -->
    <section class="py-8 py-md-11 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4" data-aos="fade-up">

                    <!-- Icon -->
                    <div class="icon text-primary mb-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z" />
                                <path d="M7 3h10a4 4 0 110 8H7a4 4 0 110-8zm0 6a2 2 0 100-4 2 2 0 000 4z" fill="#335EEA" />
                                <path d="M7 13h10a4 4 0 110 8H7a4 4 0 110-8zm10 6a2 2 0 100-4 2 2 0 000 4z" fill="#335EEA" opacity=".3" />
                            </g>
                        </svg>
                    </div>

                    <!-- Heading -->
                    <h3>
                        View Voting System
                    </h3>

                    <!-- Text -->
                    <p class="text-body-secondary mb-6 mb-md-0">
                        Details of Specific Polling Unit
                    </p>

                </div>
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="50">

                    <!-- Icon -->
                    <div class="icon text-primary mb-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z" />
                                <path d="M5.5 4h4A1.5 1.5 0 0111 5.5v1A1.5 1.5 0 019.5 8h-4A1.5 1.5 0 014 6.5v-1A1.5 1.5 0 015.5 4zm9 12h4a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-1a1.5 1.5 0 011.5-1.5z" fill="#335EEA" />
                                <path d="M5.5 10h4a1.5 1.5 0 011.5 1.5v7A1.5 1.5 0 019.5 20h-4A1.5 1.5 0 014 18.5v-7A1.5 1.5 0 015.5 10zm9-6h4A1.5 1.5 0 0120 5.5v7a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 0114.5 4z" fill="#335EEA" opacity=".3" />
                            </g>
                        </svg>
                    </div>

                    <!-- Heading -->
                    <h3>
                        upload New Unit
                    </h3>

                    <!-- Text -->
                    <p class="text-body-secondary mb-6 mb-md-0">
                        Upload your voting LGA to our database system
                    </p>

                </div>
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="100">

                    <!-- Icon -->
                    <div class="icon text-primary mb-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z" />
                                <path d="M17.272 8.685a1 1 0 111.456-1.37l4 4.25a1 1 0 010 1.37l-4 4.25a1 1 0 01-1.456-1.37l3.355-3.565-3.355-3.565zm-10.544 0L3.373 12.25l3.355 3.565a1 1 0 01-1.456 1.37l-4-4.25a1 1 0 010-1.37l4-4.25a1 1 0 011.456 1.37z" fill="#335EEA" />
                                <rect fill="#335EEA" opacity=".3" transform="rotate(15 12 12)" x="11" y="4" width="2" height="16" rx="1" />
                            </g>
                        </svg>
                    </div>

                    <!-- Heading -->
                    <h3>
                        See Voting Results
                    </h3>

                    <!-- Text -->
                    <p class="text-body-secondary mb-0">
                        View Total Unit Result from all LGA parties
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- APPLYING -->

    <!-- FOOTER -->
    <?php include('includes/footer.php') ?>

    <!-- JAVASCRIPT -->
    <!-- Vendor JS -->

    <!-- Map JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.bundle.js"></script>

</body>

</html>