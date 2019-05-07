<?php
/**
 * Home
 *
 * A Dashboard for the contacts demo
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        index.php
 * @version     1.0
 * @created     2019-05-07
 * @copyright   This work is licensed under Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

$title = "Week 12 | Home";

require_once "connection.php";
require_once "db-functions.php";
require_once "header.php";

?>

    <!-- Details about this demo file -->
    <div class="row">
        <div class="col">
            <h1 class="mt-4"><?= isset($title) ? $title : 'Week 12' ?></h1>
            <h2 class="text-muted">Welcome to My Contacts</h2>
            <p class="lead">Use the menu (above) to go to each table, if the table does not exist then you will
                need to perform the table management first.</p>
            <p>On each page, you will be able to perform the <abbr class="text-secondary">BREAD</abbr> operations.
                <abbr class="text-secondary">BREAD</abbr> stands for Browse, Read, Edit, Add and Delete.</p>
        </div>
    </div>
    <!-- begin demo HTML code -->

    <div class="row">
        <div class="col-12">
            <h2>Database Status</h2>
            <?php
            if (isset($conn) && !is_null($conn)) {
                echo "<p class='alert alert-success'>Database connection active<p>";
            } else {
                echo "<p  class='alert alert-danger'>No database connection</p>";
            } ?>
        </div>
        <div class="col-4">
            <h4>Contacts</h4>
            <?php
            if (getTableExists($conn, "contacts")) {
                echo "<p class='alert alert-success'>Table Exists</p>";

                if (rowCount($conn, "contacts") > 0) {
                    echo "<p class='alert alert-success'>Data present</p>";
                } else {
                    echo "<p  class='alert alert-danger'>Table empty</p>";
                }
            } else {
                echo "<p  class='alert alert-danger'>Table Missing</p>";
            }
            ?>

        </div>
        <div class="col-4">
            <h4>Cities</h4>
            <ul class="list-unstyled">
                <li>Table Present</li>
                <li>No data</li>
            </ul>
        </div>
        <div class="col-4">
            <h4>Countries</h4>
            <ul class="list-unstyled">
                <li>Table Present</li>
                <li>No data</li>
            </ul>
        </div>
    </div>

    <!-- end demo HTML code -->
<?php

require_once "footer.php";