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

require_once 'connection.php';
include_once 'header.php';

?>
    <div class="row">
<?php
// check to see if ID was sent
if (isset($_GET) && isset($_GET['contact'])) {
    // get the ID and convert to an integer
    $getID = $_GET['contact'];
    $id = (int)$getID;

    // if the ID is 1 or more then we can begin...
    if ($id > 0) {
        // Prepare the query, bind parameters, execute and retrieve the record
        $sql = "SELECT * FROM contacts WHERE id=:id LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $contact = $stmt->fetch(); // retrieve the FIRST contact matching the query

        if (!is_null($contact)) {
            $sql = "DELETE FROM contacts WHERE id = :id;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }
        ?>
        <div class="col-12">
            <h2>Delete Contact #<?= $contact->id ?></h2>
            <p>The following contact has been deleted.</p>
        </div>

        <div class="col-12">
                <div class="row alert alert-secondary">
                <dt class="col-3">ID</dt>
                <dd class="col-9"><?= $contact->id ?>&nbsp;</dd>

                <dt class="col-3">Given Name:</dt>
                <dd class="col-9"><?= $contact->given_name ?>&nbsp;</dd>

                <dt class="col-3">Family Name:</dt>
                <dd class="col-9"><?= $contact->family_name ?>&nbsp;</dd>

                <dt class="col-3">eMail:</dt>
                <dd class="col-9"><?= $contact->email ?>&nbsp;</dd>

                <dt class="col-3">Job Title:</dt>
                <dd class="col-9"><?= $contact->job_title ?>&nbsp;</dd>

                <dt class="col-3">City:</dt>
                <dd class="col-9"><?= $contact->city ?>&nbsp;</dd>

                <dt class="col-3">Country:</dt>
                <dd class="col-9"><?= $contact->country_code ?>&nbsp;</dd>
            </dl>
                </div>

    <p><a href="contacts-browse.php" class="btn btn-outline-secondary text-dark">Back</a></p>

    <?php
    } else {
        ?>
        <div class="col-12">
            <h1>ERROR! That ID is not valid</h1>
        </div>
        <?php
    } // end check the ID
} else {
    ?>
    <div class="col-12">
    <h1>ERROR! you cannot access this page directly</h1>
    <?php
} // end oops you came here directly
?>
    </div>
<?php
include_once 'footer.php';