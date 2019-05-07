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

$filename = "./resources/Contacts-Seed-Data.csv";

if (($fileHandle = fopen($filename, "r")) !== false) {
    // reset contacts
    $contacts=[];

    // read the file, store in the array: $contacts
    while (($data = fgetcsv($fileHandle, 1000, ",")) !== false) {
        $contacts[] = [
            'id' => htmlentities($data[0]),
            'given_name' => htmlentities($data[1]),
            'family_name' => htmlentities($data[2]),
            'email' => htmlentities($data[3]),
            'job_title' => htmlentities($data[4]),
            'city' => htmlentities($data[5]),
            'country_code' => htmlentities($data[6]),
            'created_at' => htmlentities($data[7]),
            'updated_at' => htmlentities($data[8]),
        ];
    } // end read the seed data

    fclose($fileHandle);

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

    // loop through EACH contact in the contacts array,
    // extracting the values and inserting them into the SQL
    foreach ($contacts as $contact) {
        $given = $contact['given_name'];
        $family = $contact['family_name'];
        $email = $contact['email'];
        $job = $contact['job_title'];
        $city = $contact['city'];
        $code = $contact['country_code'];
        $date = date("Y-M-d H:i:s");

        // Bind the values to the SQL parameters
        //                PARAMETER, VALUE, TYPE
        $stmt->bindParam(":given", $given, PDO::PARAM_STR);
        $stmt->bindParam(":family", $family, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":job", $job, PDO::PARAM_STR);
        $stmt->bindParam(":city", $city, PDO::PARAM_STR);
        $stmt->bindParam(":country", $code, PDO::PARAM_STR);
        $stmt->bindParam(":created", $date, PDO::PARAM_STR);
        $stmt->bindParam(":updated", $date, PDO::PARAM_STR);

        // run the SQL file
        $stmt->execute();
        // display a message if insert worked
        echo $stmt->rowCount() ? "<p class='col-4 '>" . $given . " " . $family . "</p> " : "";
    } // end foreach

} // end if file open...


// EXERCISE 1: Create the Seed code for the COUNTRIES table


// EXERCISE 2: Create the Seed code for the CITIES table


require_once "footer.php";
