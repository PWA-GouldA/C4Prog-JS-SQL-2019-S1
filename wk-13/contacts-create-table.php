<?php
/**
 * Create the database tables
 *
 * Using the connection to the database, we will create the
 * tables for this database: contacts, countries and cities
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        contacts-create-table.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.1
 * @created     2019-04-30
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

require_once 'header.php'; // ensure we have added the header
require_once 'connection.php'; // must have this file to continue

echo "<h3 class='alert alert-primary'>Creating Contacts table</h3>";

// delete the contacts table & data if it exists
$sqlDropTable = "DROP TABLE IF EXISTS contacts";
$conn->exec($sqlDropTable);

$sql = "CREATE TABLE IF NOT EXISTS contacts (
                id              INTEGER,
                given_name      TEXT,
                family_name     TEXT,
                email           TEXT,
                job_title       TEXT,
                city            TEXT,
                country_code    TEXT,
                created_at      TEXT,
                updated_at      TEXT,
                PRIMARY KEY (id)
            );";
// run the SQL command
try {
    $conn->exec($sql);
    echo "<h4 class='alert alert-success'>Contacts Table Created</h4>";
} catch (PDOException $exception) {
    echo "<h4 class='alert alert-danger'>Problem creating Contacts</h4>";
    die(0);
}


require_once "footer.php";
