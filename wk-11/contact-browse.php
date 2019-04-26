<?php
/**
 * Browse the contacts
 *
 * This file retrieves the contacts and displays them in a simple form
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

require_once 'connection.php';
include_once 'page-header.php';


// Prepare SELECT statement to SQLite3 file db
// Selects all the fields from the contacts table for all contact records
$sql = "SELECT * FROM contacts;";

// Begin the query
$stmt = $conn->query($sql);

$contacts = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
    <div class="row">
        <div class="col-12">
            <h2>All Contacts</h2>
        </div>

        <div class="col-12">
            <table class='table'>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Given</th>
                    <th>Family</th>
                    <th>Added</th>
                    <th colspan="3">Actions</th>
                </tr>
                </thead>
                <?php
                foreach ($contacts as $row) {
                    ?>
                    <tr>
                        <th><?= $row->id ?></th>
                        <td><?= $row->given_name ?></td>
                        <td><?= $row->family_name ?></td>
                        <td><?= $row->created_at ?></td>
                        <td><a href="contact-read.php?id=<?= $row->id ?>"><i class="fa fa-eye"></i> View</a></td>
                        <td><a href="contact-edit.php?id=<?= $row->id ?>"><i class="fa fa-pen"></i> Edit</a></td>
                        <td><a href="contact-delete.php?id=<?= $row->id ?>"><i class="fa fa-minus"></i> Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
<?php

include_once 'page-footer.php';