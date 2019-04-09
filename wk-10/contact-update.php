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


// check to see if ID was sent
if (isset($_POST) && isset($_POST['id'])) {
    // get the ID and convert to an integer
    $postID = $_POST['id'];
    $id = (int)$postID;

    $given = $_POST['given_name'];
    $family = $_POST['family_name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $job = $_POST['position'];

    // if the ID is 1 or more, and the family & given name are not empty and the email is not empty then we can begin...
    if ($id > 0 && $given>"" && $family>"" && $email>"") {
        // Prepare the query, bind parameters, execute and retrieve the record
        $sql = "UPDATE contacts 
                    SET given_name=:given, family_name=:family, 
                        email=:email, job_title = :job_title,
                        city=:city, country=:country,
                        updated_at=NOW() WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":given_name", $given, PDO::PARAM_STR);
        $stmt->bindParam(":family_name", $family, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":job_title", $job, PDO::PARAM_STR);
        $stmt->bindParam(":city", $city, PDO::PARAM_STR);
        $stmt->bindParam(":country", $country, PDO::PARAM_STR);
        $stmt->execute();
        $contact = $stmt->fetch();

        echo "<h3>Edit Contact <?= $contact->id ?></h3>";
        ?>
        <form id="editContact" name="editContact" method="post" action="contact-update.php">
            <input type="hidden" name="id" value="<?= $contact->id ?>"/>
            <div>
                <label for="given_name">Given Name:</label>
                <input type="text" name="given_name" id="given_name" value="<?= $contact->given_name ?>"/>
            </div>
            <div>
                <label for="family_name">Family Name:</label>
                <input type="text" name="family_name" id="family_name" value="<?= $contact->family_name ?>"/>
            </div>
            <div>
                <label for="email">eMail:</label>
                <input type="email" name="email" id="email" value="<?= $contact->email ?>"/>
            </div>
            <div>
                <button type="submit">SAVE</button>
            </div>
            <div>
                <a href="contact-browse.php">CANCEL</a>
            </div>
        </form>
        <?php
    } else {
        echo "<h1>ERROR! That ID is not valid</h1>";
    } // end check the ID

} else {
    echo "<h1>ERROR! you cannot access this page directly</h1>";
} // end oops you came here directly

