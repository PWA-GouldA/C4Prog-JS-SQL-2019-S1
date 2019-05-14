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
require_once "db-functions.php";

$filename = "./resources/Country-ISO-Codes.csv";

$tables = getTableList($conn);

// EXERCISE 1: Create the Seed code for the COUNTRIES table

if (!is_bool(array_search('countries', $tables))) {
    echo "<h3 class='alert alert-primary'>Seeding Countries</h3>";
    /** Seed the table */
    $countries = [];

    // Read the Country-ISO-Codes.csv file into an array
    if (($h = fopen("./resources/Country-ISO-Codes.csv", "r")) !== false) {
        // Convert each line into the form [code=>ISO code, name=>country name] and
        // convert extended characters to HTML entities ready for storage
        while (($data = fgetcsv($h, 1000, ",")) !== false) {
            $countries[] = [
                'code' => /* get the code from the array */,
                'name' => htmlentities($data[1])
            ];
        }

        // Close the file
        fclose($h);
    }


    // Prepare INSERT statement to SQLite3 file db
    // CREATE THE SQL TO INSERT A COUNTRY
    $insert = "";
    $stmt = $conn->prepare($insert);

    $code = null;
    $now = null;
    $name = null;

    // Bind parameters to statement variables
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':created', $now);
    $stmt->bindParam(':updated', $now);

    // Loop thru all messages and execute prepared insert statement
    echo "<div class='row'>";
    foreach ($countries as $country) {
        // Set values to bound variables
        $code = $country['code'];
        $name = $country['name'];
        $now = date("Y-m-d H:i:s");

        // Execute statement
        $stmt->execute();
        // only display affected rows (ie. only those actually inserted/updated/etc)
        echo $stmt->rowCount() ? "<p class='col-3 '>" . $name . "</p> " : "";
//        if ($stmt->rowCount()){
//            echo "<p class='col-3 '>" . $country . "</p> ";
//        } else {
//            echo "";
//        }
    } // end for each
    echo "</div>";
}

require_once "footer.php";
