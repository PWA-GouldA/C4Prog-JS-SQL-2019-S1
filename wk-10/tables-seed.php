<?php
/**
 * Seed the tables
 *
 * This file seeds the tables created by the tables_create file.
 *
 * @author      Adrian Gould <Adrian.Gould@tafe.wa.edu.au>
 * @file        tables-seed.php
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

$tables = getTableList($conn);
if (!is_bool(array_search('contacts', $tables))) {
    echo "<h3>Seeding contacts</h3>";
    /** Seed the table */
    $seeds = [
        [
            'id'          => "1",
            'given_name'  => "Jane",
            'family_name' => "Doe",
            'email'       => "jane.doe@example.com",
            'job_title'   => "sales manager",
            'city'        => "Sydney",
            'country'     => "AU",
            'created_at'  => "2019-04-08 09:35:20",
            'updated_at'  => "2019-04-08 09:35:21",
        ],
        [
            'id'          => "2",
            'given_name'  => "Jacques",
            'family_name' => "d`Carre",
            'email'       => "jacques.dcarre@example.com",
            'job_title'   => "salesman",
            'city'        => "London",
            'country'     => "UK",
            'created_at'  => "2019-04-08 09:45:27",
            'updated_at'  => "2019-04-08 09:45:27",
        ]
        ,
        [
            'id'          => "3",
            'given_name'  => "Robyn",
            'family_name' => "Banks",
            'email'       => "robyn.banks@example.com",
            'job_title'   => "accountant",
            'city'        => "Bogotá",
            'country'     => "CO",
            'created_at'  => "2019-04-08 09:45:27",
            'updated_at'  => "2019-04-08 09:45:27",
        ],
        [
            'id'          => "4",
            'given_name'  => "Eileen",
            'family_name' => "Dover",
            'email'       => "eileen.dover@example.com",
            'job_title'   => "chief executive officer",
            'city'        => "Perth",
            'country'     => "AU",
            'created_at'  => "2019-04-08 09:45:27",
            'updated_at'  => "2019-04-08 09:45:27",
        ],
        [
            'id'          => "5",
            'given_name'  => "Ivana",
            'family_name' => "Vin",
            'email'       => "ivana.vin@example.com",
            'job_title'   => "coach",
            'city'        => "Kiev",
            'country'     => "UA",
            'created_at'  => "2019-04-08 09:45:27",
            'updated_at'  => "2019-04-08 09:45:27",
        ],
    ];

    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT OR IGNORE INTO 
                    contacts (id, given_name, family_name, email, job_title, city, country, created_at, updated_at) 
               VALUES 
                    (:id, :given_name, :family_name, :email, :job_title, :city, :country, :created_at, :updated_at)";
    $stmt = $conn->prepare($insert);

    // Bind parameters to statement variables
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':given_name', $given_name);
    $stmt->bindParam(':family_name', $family_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':job_title', $job_title);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->bindParam(':updated_at', $updated_at);

    // Loop thru all messages and execute prepared insert statement
    echo "<ul>";
    foreach ($seeds as $seed) {
        // Set values to bound variables
        $id = $seed['id'];
        $given_name = $seed['given_name'];
        $family_name = $seed['family_name'];
        $email = $seed['email'];
        $job_title = $seed['job_title'];
        $city = $seed['city'];
        $country = $seed['country'];
        $created_at = $seed['created_at'];
        $updated_at = $seed['updated_at'];

        // Execute statement
        $stmt->execute();

        echo $stmt->rowCount()?"<li>" . $given_name . " " . $family_name . " added</li> ":"";
    }
    echo "</ul>";
}


if (!is_bool(array_search('countries', $tables))) {
    echo "<h3>Seeding Countries</h3>";
    /** Seed the table */
    $countries = [];

    // Read the Country-ISO-Codes.csv file into an array
    if (($h = fopen("Country-ISO-Codes.csv", "r")) !== false) {
        // Convert each line into the form [code=>ISO code, name=>country name] and
        // convert extended characters to HTML entities ready for storage
        while (($data = fgetcsv($h, 1000, ",")) !== false) {
            $countries[] = ['code' => $data[0], 'name' => htmlentities($data[1])];
        }

        // Close the file
        fclose($h);
    }


    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT OR IGNORE INTO 
                    countries(code, name, created_at, updated_at) 
               VALUES
                    (:code, :name, :created, :updated)";
    $stmt = $conn->prepare($insert);

    $code = null;
    $now = null;
    $country = null;

    // Bind parameters to statement variables
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':name', $country);
    $stmt->bindParam(':created', $now);
    $stmt->bindParam(':updated', $now);

    // Loop thru all messages and execute prepared insert statement
    echo "<ul>";
    foreach ($countries as $seed) {
        // Set values to bound variables
        $code = $seed['code'];
        $country = $seed['name'];
        $now = date("Y-m-d H:i:s");
        // Execute statement
        $stmt->execute();
        // only display affected rows (ie. only those actually inserted/updated/etc)
        echo $stmt->rowCount()?"<li>" . $country . "</li> ":"";
    }
    echo "</ul>";
}