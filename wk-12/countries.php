<?php
/**
 * Browse countries
 *
 * A basic browse countries, listing ALL countries in the DB
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        countries-browse.php
 * @version     1.0
 * @created     2019-05-07
 * @copyright   This work is licensed under Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

$title = "Week 12 | Countries";
require_once "header.php";
require_once "connection.php";

// Read the countries from the db into an array
// SQL to select all (fields) from the countries
$sqlBrowse = "SELECT * FROM countries ORDER BY created_at DESC LIMIT 5;";

// SQL to select the given, family and email only
// SELECT given_name, family_name, email FROM countries

// execute the SQL
$stmt = $conn->prepare($sqlBrowse);
$stmt->execute();

// store results in array
$countries = $stmt->fetchAll();

// To show a variable for debugging: var_dump($countries);
?>
<!-- Details about this demo file -->
<div class="row">
    <div class="col">
        <h1 class="mt-4"><?= $title; ?></h1>
        <h2 class="text-muted">Last Five Countries Added</h2>
        <div class="row">
            <p class="col"><a href="countries-browse.php" class="btn btn-primary mb-1">Browse all</a></p>
            <p class="col text-right"><a href="countries-add.php" class="btn btn-success mb-1">Add new country</a></p>
        </div>
    </div>
</div>

<!-- begin demo HTML code -->
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th>Given</th>
                <th>Family</th>
                <th>Date Added</th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($countries as $country) {
                ?>
                <tr>
                    <td><?= $country->country_code ?></td>
                    <td><?= $country->name ?></td>
                    <td><?= $country->created_at ?></td>
                </tr>
                <?php
            } // end for each
            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end demo HTML code -->
