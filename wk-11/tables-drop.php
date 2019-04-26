<?php
/**
 * Drop SQLite Database Tables
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        tables-drop.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons Attribution-ShareAlike 3.0
 *              Australia License. To view a copy of this license, visit
 *              http://creativecommons.org/licenses/by-sa/3.0/au/ or send a letter to Creative
 *              Commons, PO Box 1866, Mountain View, CA 94042, USA.
 */

require_once 'connection.php';
include_once 'page-header.php';


echo "<h3>Dropping Tables</h3>";

$tables = [
    "contacts",
    "countries"
];

foreach ($tables as $table) {
    $sql = 'DROP TABLE IF EXISTS ';
    // run the SQL command
    $conn->exec($sql . " " . $table);
    echo "<p>" . $table . " has been dropped</p>";
}

include_once 'page-footer.php';