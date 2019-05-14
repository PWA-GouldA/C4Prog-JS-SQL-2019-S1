<?php
/**
 * Connection to SQLite database
 *
 * Require this file in any PHP page that needs access to
 * the SQLite database, and then use the $conn variable to
 * provide the connection to the database.
 *
 *              require_once("connection.php");
 *
 * This file is NOT a class, but a plain PHP file. This is
 * used as a simple demonstration.
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        connection.php
 * @version     1.0
 * @created     2019-04-30
 * @copyright   This work is licensed under Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

/** Define if PRODUCTION or DEBUG/DEV */
if (!defined('DEBUG')){
    define('DEBUG',true);
}

/**
 * Define the DB Folder to hold the SQLite file
 * Define the SQLite database filename
 */
if (!defined('DB_FOLDER')){
    define('DB_FOLDER','db');
}

if (!defined('SQLITE_FILE')){
    define('SQLITE_FILE', 'contacts.db');
}

/**
 * Check to see if database folder exists, if not create it!
 */
if(!file_exists(DB_FOLDER)){
    mkdir(DB_FOLDER);
}

/**
 * if there is no connection, create it!
 * Use PDO (PHP Data Objects) for this.
 */
if (!isset($conn) || $conn==null){
    // connection string (concatenation uses .)
    try {
        $conn = new PDO("sqlite:" . DB_FOLDER . DIRECTORY_SEPARATOR . SQLITE_FILE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,            PDO::FETCH_OBJ);
    } catch( PDOException $exception){
        echo "<h1>OOPS!</h1>";
        echo "<p>We have a problem connecting to the database.</p>";
        echo "<p>Please inform the administrator at errors@example.com</p>";
        die(0); // terminate script
    }
}