<?php
/**
 * Seed the database tables
 *
 * Add sample/default data to the cities, countries and contacts tables
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        seed-tables.php
 * @project     C4Prog-JS-SQL-2019-S1
 * @version     1.1
 * @created     2019-05-07
 * @copyright   This work is licensed under the Creative Commons
 *              Attribution-ShareAlike 3.0 Australia License.
 */

require_once "connection.php";
require_once "header.php";

// define a contact as an array using associative data
$contacts = [
    [
        'given_name' => 'Adrian',
        'family_name' => 'Gould',
        'email' => 'adrian.gould@example.com',
        'job_title' => 'lecturer',
        'city' => 'Perth',
        'country_code' => 'AU',
        'created_at' => '2019-04-30 12:25:45',
        'updated_at' => '2019-04-30 12:25:45',
    ],
    [
        'given_name' => 'Jacques',
        'family_name' => 'd\'Carre',
        'email' => 'mechanic@example.com',
        'job_title' => 'mechanic',
        'city' => 'London',
        'country_code' => 'CA',
        'created_at' => '2019-04-30 12:25:45',
        'updated_at' => '2019-04-30 12:25:45',
    ],

];

// INSERT INTO
//    table_name ( column_name, column_name, ...)
// VALUES
//    ( 'value_one', 'value_two', ...);

// SQL Statement with placeholders
// remove the ID as we want the SQL to insert automatically
$sqlInsert = "
INSERT OR IGNORE INTO 
    contacts ( 
        given_name, family_name, 
        email, job_title, city, 
        country_code, created_at, updated_at )
VALUES 
    (   
        :given, :family, 
        :email, :job, :city, 
        :country, :created, :updated 
        );
";

// Prepare the SQL for use
$stmt = $conn->prepare($sqlInsert);

foreach ($contacts as $contact) {
    $given = $contact['given_name'];
    $family = $contact['family_name'];
    $email = $contact['email'];
    $job = $contact['job_title'];
    $city = $contact['city'];
    $code = $contact['country_code'];
    $date = date("Y-M-d H:i:s");

// Bind the values to the SQL parameters
    $stmt->bindParam(":given", $given, PDO::PARAM_STR);
    $stmt->bindParam(":family", $family, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":job", $job, PDO::PARAM_STR);
    $stmt->bindParam(":city", $city, PDO::PARAM_STR);
    $stmt->bindParam(":country", $code, PDO::PARAM_STR);
    $stmt->bindParam(":created", $date, PDO::PARAM_STR);
    $stmt->bindParam(":updated", $date, PDO::PARAM_STR);

    $stmt->execute();
    echo $stmt->rowCount() ? "<p class='col-3 '>" . $given . " " . $family . " added</p> " : "";
} // end foreach

require_once "footer.php";