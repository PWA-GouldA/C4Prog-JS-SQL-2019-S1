<?php
/**
 * The header HTML content for the pages in this demo
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        page-header.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-10
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
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
        <!-- FontAwesome -->
        <link rel="stylesheet" href="../assets/css/fontawesome/all.min.css">
        <!-- Cert 4 Programming Specific Stylesheet -->
        <link rel="stylesheet" href="../assets/css/c4prog.css"/>


        <title>BREAD Demonstration (SQLite)</title>

</head>
<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="./">BREAD (SQLite)</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href=".">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="contact-browse.php" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Contacts
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="contact-browse.php">Browse</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="contact-add.php">Add</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="db-management.php">Database Management</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">

            <div class="row">
                <div class="col">
                    <h1 class="mt-4">BREAD using SQLite and PDO</h1>
                </div>
            </div>

<?php