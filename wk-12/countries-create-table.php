<?php
/**
 * Create the database tables
 *
 * Using the connection to the database, we will create the
 * tables for this database: contacts, countries and cities
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        countries-create-table.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.1
 * @created     2019-04-30
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

require_once 'header.php'; // ensure we have added the header
require_once 'connection.php'; // must have this file to continue

/**
 * Table: countries
 * Field name       Type        Primary Key?
 * -------------------------------------------------------------
 * country_code     TEXT            YES
 * name             TEXT
 * created_at       TEXT
 * updated_at       TEXT
 */
// delete the countries table & data if it exists
$sqlDropTable = "DROP TABLE IF EXISTS countries";
$conn->exec($sqlDropTable);

// Create the Countries table given the data above
// ADD THE CORRECT SQL TO CREATE THE TABLE
$sql = " ";

echo "<h3 class='alert alert-primary'>Creating Countries table</h3>";

// run the SQL command
try {
    // execute the SQL

    echo "<h4 class='alert alert-success'>Countries Table Created</h4>";
} catch (PDOException $exception) {
    echo "<h4 class='alert alert-danger'>Problem creating Countries</h4>";
    // Other exception handling/error output
    if (DEBUG) {
        echo "<p>" . $exception->getMessage() . "</p>";
        echo "<p>" . $exception->getTraceAsString() . "</p>";
    }
    // end other error output
    die(0);
}


require_once "footer.php";
