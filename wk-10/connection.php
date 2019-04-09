<?php
/**
 * Connection to SQLite Database
 *
 * Require this file in any PHP page that needs access to the SQLite database,
 * and then use the $conn variable to provide the connection
 *
 *     require_once('connection.php');
 *
 * It should be noted that this is NOT a class, but a plain PHP file. It is a
 * simple demonstration file.
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        connection.php
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */


/**
 * Define the DB Folder to hold the SQLite file
 * Define the SQLite database filename
 */
if (!defined('DB_FOLDER')) {
    define('DB_FOLDER', 'db');
    define('SQLITE_FILE', 'contacts.db');
}

/**
 * Check to see if a connection exists, if not set to null
 */
if (!isset($conn)) {
    $conn = null;
}

/**
 * Create the DB FOLDER if it does not exist
 */
if (!file_exists(DB_FOLDER)) {
    mkdir(DB_FOLDER);
}

/**
 * if there is no connection, create one
 */
if ($conn == null) {
    $conn = new PDO("sqlite:" . DB_FOLDER . DIRECTORY_SEPARATOR . SQLITE_FILE);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}


/**
 * retrieve a list of the tables in the SQLite database
 *
 * @param null $conn
 * @return array
 */
if (!function_exists('getTableList')) {
    function getTableList($conn = null)
    {
        try {
            $stmt = $conn->query("SELECT name FROM sqlite_master WHERE type = 'table' ORDER BY name");
            $tables = [];
            while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
                $tables[] = $row->name;
            }

            return $tables;
        }
        catch (PDOException $exception) {
            echo "<h1>ERROR!</h1>";
            echo "<h3>Error code: GTL01</h3>";
            echo "<p>We have an error in the connection to the database.</p>";
            die(0);
        }
    } // end function Get Table List
} // end if
