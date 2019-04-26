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
include_once 'page-header.php';

echo "<p></p>";
$tables = getTableList($conn);
if (!is_bool(array_search('contacts', $tables))) {
    echo "<h3 class='alert alert-primary'>Seeding Contacts Table</h3>";

    $people = [];
    // Read the Country-ISO-Codes.csv file into an array
    if (($h = fopen("./resources/Contacts-Seed-Data.csv", "r")) !== false) {
        // Convert each line into the form [given_name=>given name, family_name=>family name, etc] and
        // convert extended characters to HTML entities ready for storage
//        [
//            'id'          => "1",
//            'given_name'  => "Jane",
//            'family_name' => "Doe",
//            'email'       => "jane.doe@example.com",
//            'job_title'   => "sales manager",
//            'city'        => "Sydney",
//            'country'     => "AU",
//            'created_at'  => "2019-04-08 09:35:20",
//            'updated_at'  => "2019-04-08 09:35:21",
//        ],
        while (($data = fgetcsv($h, 1000, ",")) !== false) {
            $people[] = [
                'id'          => htmlentities($data[0]),
                'given_name'  => htmlentities($data[1]),
                'family_name' => htmlentities($data[2]),
                'email'       => htmlentities($data[3]),
                'job_title'   => htmlentities($data[4]),
                'city'        => htmlentities($data[5]),
                'country'     => htmlentities($data[6]),
                'created_at'  => htmlentities($data[7]),
                'updated_at'  => htmlentities($data[8]),
            ];
        }

        // Close the file
        fclose($h);
    }

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
    echo "<div class='row'>";
    foreach ($people as $person) {
        // Set values to bound variables
        $id = $person['id'];
        $given_name = $person['given_name'];
        $family_name = $person['family_name'];
        $email = $person['email'];
        $job_title = $person['job_title'];
        $city = $person['city'];
        $country = $person['country'];
        $created_at = $person['created_at'];
        $updated_at = $person['updated_at'];

        // Execute statement
        $stmt->execute();

        echo $stmt->rowCount() ? "<p class='col-3 '>" . $given_name . " " . $family_name . " added</p> " : "";
    }
    echo "</div>";
}


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
                'code' => htmlentities($data[0]),
                'name' => htmlentities($data[1])
            ];
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
    echo "<div class='row'>";
    foreach ($countries as $person) {
        // Set values to bound variables
        $code = $person['code'];
        $country = $person['name'];
        $now = date("Y-m-d H:i:s");
        // Execute statement
        $stmt->execute();
        // only display affected rows (ie. only those actually inserted/updated/etc)
        echo $stmt->rowCount() ? "<p class='col-3 '>" . $country . "</p> " : "";
    }
    echo "</div>";
}

if (!is_bool(array_search('cities', $tables))) {
    echo "<h3 class='alert alert-primary'>Seeding Cities</h3>";
    /** Seed the table */
    $cities = [];

    // Read the Country-ISO-Codes.csv file into an array
    if (($h = fopen("./resources/Cities-Seed-Data.csv", "r")) !== false) {
        // Convert each line into the form [code=>ISO code, name=>country name] and
        // convert extended characters to HTML entities ready for storage
        while (($data = fgetcsv($h, 1000, ",")) !== false) {
            $cities[] = [
                'id'           => htmlentities($data[0]),
                'name'         => htmlentities($data[1]),
                'country_code' => htmlentities($data[2]),
                'population'   => htmlentities($data[3]),
                'created_at'   => htmlentities($data[4]),
                'updated_at'   => htmlentities($data[5]),
            ];
        }

        // Close the file
        fclose($h);
    }


    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT OR IGNORE INTO 
                    cities(id, name, country_code, population, created_at, updated_at)
               VALUES
                    (:id, :name, :country, :pop, :created, :updated)";
    $stmt = $conn->prepare($insert);

    $id = null;
    $name = null;
    $country = null;
    $pop = null;
    $created = null;
    $updated = null;

    // Bind parameters to statement variables
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':pop', $pop);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':updated', $updated);

    // Loop thru all messages and execute prepared insert statement
    echo "<div class='row'>";
    foreach ($cities as $city) {
        // Set values to bound variables
        $id = $city['id'];
        $name = $city['name'];
        $country = $city['country_code'];
        $pop = $city['population'];
        $created = $city['created_at'];
        $updated = $city['updated_at'];
        // Execute statement
        $stmt->execute();
        // only display affected rows (ie. only those actually inserted/updated/etc)
        echo $stmt->rowCount() ? "<p class='col-3 '>" . $name . "</p> " : "";
    }
    echo "</div>";
}


include_once 'page-footer.php';