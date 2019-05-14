<?php
/**
 * Read ONE contact
 *
 * This file retrieves the contact for a given ID and displays it on a simple HTML page
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        contacts-browse.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.0
 * @created     2019-04-08
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License. To view a copy of
 *              this license, visit http://creativecommons.org/licenses/by-sa/3.0/au/
 *              or send a letter to Creative Commons, PO Box 1866, Mountain View,
 *              CA 94042, USA.
 */

require 'connection.php';
include_once 'header.php';

// check to see if ID was sent
if (isset($_POST) && isset($_POST['given_name'])) {
    $given = $_POST['given_name'];
    $family = $_POST['family_name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $job = $_POST['position'];
    $timeNow = date('Y-m-d H:i:s');

    // if the the family & given name are not empty and the email is not empty then we can begin...
    if ($given > "" && $family > "" && $email > "") {
        // Prepare the query, bind parameters, execute and retrieve the record
        $sql = "INSERT INTO contacts (
                    given_name, family_name, email, 
                    job_title, city, country_code, 
                    created_at, updated_at
                    )
                VALUES ( 
                    :given, :family, :email, 
                    :job, :city, :country,
                    :create_time, :update_time
                )";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":given", $given, PDO::PARAM_STR);
        $stmt->bindParam(":family", $family, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":job", $job, PDO::PARAM_STR);
        $stmt->bindParam(":city", $city, PDO::PARAM_STR);
        $stmt->bindParam(":country", $country, PDO::PARAM_STR);
        $stmt->bindParam(":create_time", $timeNow, PDO::PARAM_STR);
        $stmt->bindParam(":update_time", $timeNow, PDO::PARAM_STR);
//        echo "<pre><code>".$stmt->debugDumpParams()."</code></pre>";
//        die();
        $stmt->execute();
        // $contact = $stmt->fetch();

        echo "<h3>Updated Contact</h3>";
        header("Location: contacts.php");
        ?>

        <?php
    } else {
        echo "<h1>ERROR! The contact details are not valid</h1>";
    } // end check the contact details

} else {
    echo "<h1>ERROR! you cannot access this page directly</h1>";
} // end oops you came here directly

include_once 'footer.php';