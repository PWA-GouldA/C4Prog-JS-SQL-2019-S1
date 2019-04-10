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

$tables = getTableList($conn);

if (is_bool(array_search('contacts', $tables))) {
    echo "<h3>Creating contacts table</h3>";
    $sql = "CREATE TABLE IF NOT EXISTS contacts (
                id INTEGER,
                given_name TEXT,
                family_name TEXT,
                email TEXT,
                job_title TEXT,
                city TEXT,
                country TEXT,
                created_at TEXT,
                updated_at TEXT,
                PRIMARY KEY (id)
            );";
    // run the SQL command
    $conn->exec($sql);
}

if (is_bool(array_search('countries', $tables))) {
    echo "<h3>Creating Countries table</h3>";
    $sql = "CREATE TABLE IF NOT EXISTS countries (
                code TEXT,
                name TEXT,
                created_at TEXT,
                updated_at TEXT,
                PRIMARY KEY (code)
            );";
    // run the SQL command
    $conn->exec($sql);
}
