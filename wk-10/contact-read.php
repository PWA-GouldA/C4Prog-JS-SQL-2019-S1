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


// Prepare SELECT statement to SQLite3 file db
// Selects all the fields from the contacts table for all contact records
$sql = "SELECT * FROM contacts WHERE id=:id;";

$id = $_GET['id'];
$id = (int)$id;

// Begin the query preparation
$stmt = $conn->prepare($sql);

// Bind the ID to the parameter
$stmt->bindParam(":id", $id);

// execute the query and get the results
$stmt->execute();
$contacts = $stmt->fetchAll();

echo "<h3>Show all records as paragraphs</h3>";
foreach ($contacts as $row) {
    ?>
    <p>ID: <?= $row->id ?></p>
    <p>Given Name: <?= $row->given_name ?></p>
    <p>Family Name: <?= $row->family_name ?></p>
    <p>Position: <?= $row->job_title ?></p>
    <p>eMail: <?= $row->email ?></p>
    <p>City: <?= $row->city ?></p>
    <p>Country: <?= $row->country ?></p>
    <p>Added: <?= $row->created_at ?></p>
    <p>Updated: <?= $row->updated_at ?></p>
    <?php
}

