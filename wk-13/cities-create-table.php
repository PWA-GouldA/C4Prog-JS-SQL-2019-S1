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


/**
 * Table: cities
 * Field Name       Type (You Add)      Primary Key?
 * -------------------------------------------------------------
 * id               INTEGER             Y
 * name             TEXT
 * country_code     TEXT
 * population       INTEGER
 * created_at       TEXT
 * updated_at       TEXT
 */

// delete the cities table & data if it exists
$sqlDropTable = "DROP TABLE IF EXISTS cities";
$conn->exec($sqlDropTable);

$sql = "CREATE TABLE IF NOT EXISTS cities (
                id              INTEGER,
                name            TEXT,
                country_code    TEXT,
                population      INTEGER,
                created_at      TEXT,
                updated_at      TEXT,
                PRIMARY KEY (id)
            );";

echo "<h3 class='alert alert-primary'>Creating Cities table</h3>";

// run the SQL command
try {
    $conn->exec($sql);
    echo "<h4 class='alert alert-success'>Cities Table Created</h4>";
} catch (PDOException $exception) {
    echo "<h4 class='alert alert-danger'>Problem creating Cities</h4>";
    die(0);
}

require_once "footer.php";
