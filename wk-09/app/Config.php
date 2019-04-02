<?php
namespace App;

class Config
{
    /**
     * path to the sqlite file
     */
    const PATH_TO_SQLITE_FILE = 'db/phpsqlite.db';

    const OPTIONS = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

}