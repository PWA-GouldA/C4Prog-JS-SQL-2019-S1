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

require 'connection.php';


// Prepare SELECT statement to SQLite3 file db
// Selects all the fields from the contacts table for all contact records
$sql = "SELECT * FROM contacts;";

// Begin the query
$stmt = $conn->query($sql);

$contacts = $stmt->fetchAll(PDO::FETCH_OBJ);

echo "<h3>Show all records as paragraphs</h3>";
foreach ($contacts as $row) {
    echo "<p>Id: " . $row->id . ") Name: "
        . $row->given_name . " " . $row->family_name
        . " (Added: " . $row->created_at . ")</p>\n";
}

echo "<h3>Show all records as a list</h3>";
echo "<ul>";
foreach ($contacts as $row) {
    ?>
    <li>
        <a href="contact-read.php?id=<?= $row->id ?>">
            <?= $row->id ?>) <?= $row->given_name ?> <?= $row->family_name ?>
        </a>
        (<?= $row->created_at ?>)
        <a href="contact-edit.php?id=<?= $row->id ?>">EDIT</a>
    </li>
    <?php
}
echo "</ul>";
