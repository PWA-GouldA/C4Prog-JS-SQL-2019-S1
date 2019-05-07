<?php
/**
 * Database Functions
 *
 * Collection of general database functions that are performed semi-regularly
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        db-functions.php
 * @version     1.0
 * @created     2019-05-07
 * @copyright   This work is licensed under Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

require_once "connection.php";

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
            echo "<h3>Error code: DBF001</h3>";
            echo "<p>We have an error gathering tables.</p>";
            die(0);
        }
    } // end function Get Table List
} // end if


/**
 * retrieve a list of the tables in the SQLite database
 *
 * @param null $conn
 * @return array
 */
if (!function_exists('getTableExists')) {
    function getTableExists($conn = null, $tableName="")
    {
        try {
            $sql="SELECT count(name) as count FROM sqlite_master WHERE type = 'table' AND name = :table_name LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":table_name",$tableName,PDO::PARAM_STR);
            $stmt->execute();

            $row = $stmt->fetch(\PDO::FETCH_OBJ);
            $tableExists = $row->count;
            return $tableExists;
        }
        catch (PDOException $exception) {
            echo "<h1>ERROR!</h1>";
            echo "<h3>Error code: DBF002</h3>";
            echo "<p>We have an error verifying table exists.</p>";
            die(0);
        }
    } // end function Get Table List
} // end if

if (!function_exists('CountTables')) {
    function countTables($conn = null)
    {
        try {
            $stmt = $conn->query("SELECT count(name) as count FROM sqlite_master WHERE type = 'table'");
            $count=0;
            $results = $stmt->fetch(\PDO::FETCH_OBJ);
            $count = $results->count;

            return $count;
        }
        catch (PDOException $exception) {
            echo "<h1>ERROR!</h1>";
            echo "<h3>Error code: DBF003</h3>";
            echo "<p>We have an error counting tables.</p>";
            die(0);
        }
    } // end function Get Table List
} // end if


if (!function_exists('rowCount')) {
    function rowCount($conn = null, $tableName)
    {
        try {
            $sql = "SELECT count(*) as count FROM ".$tableName;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetch(\PDO::FETCH_OBJ);
            $count = $results->count;
            return $count;
        }
        catch (PDOException $exception) {
            echo "<h1>ERROR!</h1>";
            echo "<h3>Error code: DBF004</h3>";
            echo "<p>We have an error with the row count.</p>";
            echo "<p>".$exception->getMessage()."</p>";
            echo "<p></p>";
            echo "<p>Table: {$tableName}</p>";
            die(0);
        }
    } // end function Get Table List
} // end if

