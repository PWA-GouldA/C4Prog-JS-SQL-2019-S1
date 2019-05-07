<?php
/**
 * Create the database tables
 *
 * Using the connection to the database, we will create the
 * tables for this database: contacts, countries and cities
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        create-tables.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-30
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

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

/**
 * Table: countries
 * Field name       Type        Primary Key?
 * -------------------------------------------------------------
 * code             TEXT            YES
 * name             TEXT
 * created_at       TEXT
 * updated_at       TEXT
 */
// EXERCISE: ADD THE PHP CODE TO CREATE THE COUNTRIES TABLE
// delete the contacts table & data if it exists
$sqlDropTable = "DROP TABLE IF EXISTS countries";
$conn->exec($sqlDropTable);

/**
 * Table: cities
 * Field Name       Type (You Add)      Primary Key?
 * -------------------------------------------------------------
 * id
 * name
 * country_code
 * population
 * created_at
 * updated_at
 */

// delete the contacts table & data if it exists
$sqlDropTable = "DROP TABLE IF EXISTS cities";
$conn->exec($sqlDropTable);

// EXERCISE: ADD THE FIELD TYPES TO THE TABLE ABOVE
// EXERCISE: IDENTIFY THE PRIMARY KEY FOR THE TABLE ABOVE
// EXERCISE: WRITE THE PHP CODE TO CREATE THE CITIES TABLE