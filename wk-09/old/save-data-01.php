<?php

$postData = $_POST;

echo "<h1>Content of POSTed form data</h1>";
echo "<ul>";
foreach ($postData as $item=>$value){
    echo "<li>{$item} => {$value}</li>";
}
echo "</ul>";


/* create a database connection to demo.sqlite3 */

/* check to see if people table exists */

/* if the table does not exist, then create it */

/* save the data to the people table in demo.sqlite3 */
