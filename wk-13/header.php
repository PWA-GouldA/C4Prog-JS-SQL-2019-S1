<?php
/**
 * Header
 *
 * Header content for our pages
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        header.php
 * @version     1.0
 * @created     2019-05-07
 * @copyright   This work is licensed under Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS file included -->
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"/>
    <!-- FontAwesome 5 Free CSS file included -->
    <link rel="stylesheet" href="../assets/css/fontawesome/all.min.css"/>
    <!-- Cert 4 Programming Specific Stylesheet -->
    <link rel="stylesheet" href="../assets/css/c4prog.css"/>
    <!-- Leafletjs Specific Stylesheet -->
    <link rel="stylesheet" href="../assets/css/leaflet/leaflet.css"/>

    <?php /* use PHP to show a different title and header id $title is set */ ?>
    <title><?= isset($title) ? $title : 'Week 13' ?></title>

</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../wk-12">Week 13</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="./index.php">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="contacts.php" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contacts
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="contacts.php">Contacts</a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-header">Table Management</p>
                    <a class="dropdown-item" href="contacts-create-table.php">Create Table</a>
                    <a class="dropdown-item" href="contacts-seed-table.php">Seed Table</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="contacts.php" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cities.php">cities</a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-header">Table Management</p>
                    <a class="dropdown-item" href="cities-create-table.php">Create Table</a>
                    <a class="dropdown-item" href="cities-seed-table.php">Seed Table</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="countries.php" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Countries
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="countries.php">countries</a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-header">Table Management</p>
                    <a class="dropdown-item" href="countries-create-table.php">Create Table</a>
                    <a class="dropdown-item" href="countries-seed-table.php">Seed Table</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
        </ul>

    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
