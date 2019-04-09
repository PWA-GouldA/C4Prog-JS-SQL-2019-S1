<?php
/**
 * Edit selected contact
 *
 * This file retrieves the contact for a given ID, displays the details in a form, and then when submit is pressed,
 * the updates are sent (via POST) to the update page.
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        contacts-edit.php
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
if (isset($_GET) && isset($_GET['id'])) {
    // get the ID and convert to an integer
    $getID = $_GET['id'];
    $id = (int)$getID;

    // if the ID is 1 or more then we can begin...
    if ($id > 0) {
        // Prepare the query, bind parameters, execute and retrieve the record
        $sql = "SELECT * FROM contacts WHERE id=:id LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $getID);
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
                <label for="position">Job Title:</label>
                <input type="text" name="position" id="position" value="<?= $contact->job_title ?>"/>
            </div>
            <div>
                <label for="city">City:</label>
                <input type="text" name="city" id="city" value="<?= $contact->city ?>"/>
            </div>
            <div>
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" value="<?= $contact->country ?>"/>
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