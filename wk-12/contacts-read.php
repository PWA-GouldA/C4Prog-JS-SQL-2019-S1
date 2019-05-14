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

require_once 'connection.php';
include_once 'header.php';


// Prepare SELECT statement to SQLite3 file db
// Selects all the fields from the contacts table for all contact records
$sql = "SELECT * FROM contacts WHERE id = :id;";

if (isset($_GET['contact'])) {
    $id = $_GET['contact'];
    $id = (int)$id; // make sure ID is and Integer

    // Begin the query preparation
    $stmt = $conn->prepare($sql);

    // Bind the ID to the parameter
    $stmt->bindParam(":id", $id);

    // execute the query and get the results
    $stmt->execute();
    $contacts = $stmt->fetchAll();
    ?>

    <div class="row">
        <div class="col-12">
            <h2>Read Contact</h2>
        </div>

    <div class="col-12">
    <p>
        <a href="contacts-browse.php" class="btn btn-primary mb-1">Browse all</a>
        <a href="contacts-add.php" class="btn btn-success mb-1">Add new contact</a>
    </p>
    <?php
    if (count($contacts)>0){
        foreach ($contacts as $row) {
     ?>
    <ul class="list-unstyled">
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">ID:</b>
            <span class="col-8"><?= $row->id ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">Given Name: </b>
            <span class="col-8"><?= $row->given_name ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">Family Name: </b>
            <span class="col-8"><?= $row->family_name ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">Position: </b>
            <span class="col-8"><?= $row->job_title ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">eMail: </b>
            <span class="col-8"><?= $row->email ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">City: </b>
            <span class="col-8"><?= $row->city ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">Country: </b>
            <span class="col-8"><?= $row->country_code ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">Added: </b>
            <span class="col-8"><?= $row->created_at ?></span>
        </li>
        <li class="row border-bottom border-secondary border-1 pt-1 pb-1">
            <b class="col-2">Updated: </b>
            <span class="col-8"><?= $row->updated_at ?></span>
        </li>
    </ul>

    <div class="row">
            <a href="contact-add.php" class="col btn btn-primary mr-2"><i class="fa fa-plus"></i> Add</a>
            <a href="contact-edit.php?id=<?= $row->id ?>" class="col btn btn-secondary mr-2"><i class="fa fa-pen"></i>
            Edit</a>
            <a href="contact-delete.php?id=<?= $row->id ?>" class="col btn btn-warning mr-2"><i class="fa fa-minus"></i>
            Delete</a>
        <div class="col-8"></div>
    </div>
    <?php
    }// end for each
        } else {
            echo "<h4 class='alert alert-info'>No contact with that ID</h4>";
        }
    } else {
    header("Location: contacts-browse.php");
    }
include_once 'footer.php';
