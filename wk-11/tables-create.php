<?php
/**
 * Create the database tables
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        tables-create.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */

require_once 'connection.php';
include_once 'page-header.php';


$tables = getTableList($conn);
echo "<p></p>";

if (is_bool(array_search('contacts', $tables))) {
    echo "<h3 class='alert alert-primary'>Creating Contacts table</h3>";
    $sql = "CREATE TABLE IF NOT EXISTS contacts (
                id          INTEGER,
                given_name  TEXT,
                family_name TEXT,
                email       TEXT,
                job_title   TEXT,
                city        TEXT,
                country     TEXT,
                created_at  TEXT,
                updated_at  TEXT,
                PRIMARY KEY (id)
            );";
    // run the SQL command
    $conn->exec($sql);
    echo "<h4 class='alert alert-success'>Contacts Table Created</h4>";
}

if (is_bool(array_search('countries', $tables))) {
    echo "<h3 class='alert alert-primary'>Creating Countries Table</h3>";
    $sql = "CREATE TABLE IF NOT EXISTS countries (
                code        TEXT,
                name        TEXT,
                created_at  TEXT,
                updated_at  TEXT,
                PRIMARY KEY (code)
            );";
    // run the SQL command
    $conn->exec($sql);
    echo "<h4 class='alert alert-success'>Countries Table Created</h4>";
}


if (is_bool(array_search('cities', $tables))) {
    echo "<h3 class='alert alert-primary'>Creating Cities Table</h3>";
    $sql = "CREATE TABLE IF NOT EXISTS cities (
                id              INTEGER,	
                name	        TEXT,
                country_code    TEXT  ,   	
                population      INTEGER,       	
                created_at      TEXT,
                updated_at	    TEXT,
                PRIMARY KEY (id)
         );";
    // run the SQL command
    $conn->exec($sql);
    echo "<h4 class='alert alert-success'>Cities Table Created</h4>";
}


include_once 'page-footer.php';