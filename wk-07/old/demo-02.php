<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS file included -->
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css"/>
    <!-- FontAwesome 5 Free CSS file included -->
    <link rel="stylesheet" href="../../assets/css/fontawesome/all.min.css"/>
    <!-- Cert 4 Programming Specific Stylesheet -->
    <link rel="stylesheet" href="../../assets/css/c4prog.css"/>


    <title>Week 07 | Demo 02</title>

</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="..">Week 07</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- no menu items shown in this example -->
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">

        <!-- Details about this demo file -->
        <div class="row">
            <div class="col">
                <h1 class="mt-4">Week 07 | Demo 02 | POST/GET Values</h1>
                <h2 class="text-muted">Report the values from GET and POST methods</h2>
                <p class="lead">This small PHP file reports what was sent from the form in the
                    <a href="demo-02.html">demo-02.html</a> file.</p>
            </div>
        </div>
        <!-- begin demo HTML code -->

        <?php
        $postValues = $_POST;
        $getValues = $_GET;
        ?>
        <div class="row">
            <div class="col">

                <h2>POST Values</h2>
                <p>These do not get displayed in the URL as they are sent as a "packet" of data</p>
                <ul class='list-unstyled'>
                    <?php
                    foreach ($postValues as $key => $value) {
                        echo "<li class='row'><strong class='col-3'>$key</strong><span class='col'>$value</span></li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="col">
                <h2>GET Values</h2>
                <p>Check the URL to see these are displayed after the ?</p>
                <ul class='list-unstyled'>
                    <?php
                    foreach ($getValues as $key => $value) {
                        echo "<li class='row'><strong class='col-3'>$key</strong><span class='col'>$value</span></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- end demo HTML code -->
    </div>
</main>

<footer class="footer mt-auto py-3 bg-danger text-white">
    <div class="container">
        <div class="row">
            <p class="text-white col">This page created by: Adrian Gould</p>
            <p class="col">
                Made with
                <a href="https://getbootstrap.com"
                   target="_blank" class="text-white">
                    Bootstrap
                </a> |
                <a href="https://hackerthemes.com/bootstrap-cheatsheet/"
                   target="_blank" class="text-white">
                    Bootstrap Cheat Sheet
                </a>
            </p>
            <p class="text-white-50 col text-right">Last Updated: 2019-03-12</p>
        </div>
    </div>
</footer>

<!-- JavaScript Includes - External JS code -->
<script src="../../assets/js/jquery/jquery-3.3.1.min.js"></script>
<script src="../../assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<script src="demo-02.js"></script>

</body>
</html>