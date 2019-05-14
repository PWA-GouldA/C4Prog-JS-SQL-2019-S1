<?php
/**
 * Browse Contacts
 *
 * A basic browse contacts, listing ALL contacts in the DB
 *
 * @author      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * @file        contacts-browse.php
 * @version     1.0
 * @created     2019-05-07
 * @copyright   This work is licensed under Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

$title = "Week 13 | Browse Contacts";
require_once "header.php";
require_once "connection.php";

// Read the contacts from the db into an array
// SQL to select all (fields) from the contacts
$sqlBrowse = "SELECT * FROM contacts ORDER BY given_name, family_name, email;";

// SQL to select the given, family and email only
// SELECT given_name, family_name, email FROM contacts

// execute the SQL
$stmt = $conn->prepare($sqlBrowse);
$stmt->execute();

// store results in array
$contacts = $stmt->fetchAll();

// To show a variable for debugging: var_dump($contacts);
?>
<!-- Details about this demo file -->
<div class="row">
    <div class="col">
        <h1 class="mt-4"><?= $title; ?></h1>
        <h2 class="text-muted">Contacts List</h2>
        <p class="text-right"><a href="contacts-add.php" class="btn btn-success mb-1">Add new contact</a></p>


    </div>
</div>
<!-- begin demo HTML code -->
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th>Given</th>
                <th>Family</th>
                <th>eMail</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($contacts as $contact) {
                ?>
                <tr>
                    <td><?= $contact->given_name ?></td>
                    <td><?= $contact->family_name ?></td>
                    <td><?= $contact->email ?></td>

                    <td class="btn-group">
                        <a href="contacts-read.php?contact=<?= $contact->id ?>"
                            class="btn btn-primary mb-1">
                            <i class="fa fa-eye"></i> View
                        </a>

                        <a href="contacts-edit.php?contact=<?= $contact->id ?>"
                            class="btn btn-warning mb-1">
                            <i class="fa fa-pen"></i> Edit
                        </a>

                        <a href="contacts-delete.php?contact=<?= $contact->id ?>"
                            class="btn btn-danger mb-1">
                            <i class="fa fa-minus"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end demo HTML code -->
