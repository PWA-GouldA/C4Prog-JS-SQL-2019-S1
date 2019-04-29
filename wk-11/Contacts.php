<?php
/**
 * Contact Class
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        Contact.php
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */


require_once './connection.php';

class Contact
{

    private $conn = null;
    private $results = null;

    /**
     * Contact constructor.
     * @param null $conn
     */
    function __construct($connection = null)
    {
        $this->conn = $connection;
    }


    function browse($page = 1, $pageSize = 10)
    {
        try {
            $startAt = 0;
            $sql = "SELECT * FROM contacts ";
            if (!is_null($page)) {
                $sql = $sql.' LIMIT :startItem,:maxItems';
            }
            $stmt = $this->conn->prepare($sql);

            $page = $page >= 1 ? $page : 1;
            $startAt = ($page - 1) * $pageSize;
            if (!is_null($page)) {
                $stmt->bindParam(":startItem", $startAt, PDO::PARAM_INT);
                $stmt->bindParam(":maxItems", $pageSize, PDO::PARAM_INT);
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }
        catch (PDOException $exception) {
            echo "<h1>ERROR!</h1>";
            echo "<h3>Error code: CLASS01</h3>";
            echo "<p>We have an error in the connection to the database.</p>";
            echo "<p>" . $exception->getMessage() . "</p>";
            echo "<p></p>";
            echo "<p>Table: Contacts</p>";
            die(0);
        }
    }

    function read($id = 0)
    {
    }

    function add($data = [])
    {
    }

    function edit($id, $data = [])
    {
    }

    function delete($id = 0)
    {
    }

    /**
     * @return  mixed
     */
    function count()
    {
        try {
            $sql = "SELECT count(*) as count FROM contacts";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $results->count;
            return $count;
        }
        catch (PDOException $exception) {
            echo "<h1>ERROR!</h1>";
            echo "<h3>Error code: CLASS01</h3>";
            echo "<p>We have an error in the connection to the database.</p>";
            echo "<p>" . $exception->getMessage() . "</p>";
            echo "<p></p>";
            echo "<p>Table: Contacts</p>";
            die(0);
        }
    } // end function Get Table List

}

//$c = new Contact($conn);
//var_dump($c->browse(2,4));
//$stmt = $this->conn->prepare($sql);
