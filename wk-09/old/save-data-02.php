<?php
/* Add the autoloading of application code to the file */
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\Projects;

?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS file included -->
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css"/>
    <!-- FontAwesome 5 Free CSS file included -->
    <link rel="stylesheet" href="../../assets/css/fontawesome/all.min.css"/>
    <!-- Cert 4 Programming Specific Stylesheet -->
    <link rel="stylesheet" href="../../assets/css/c4prog.css"/>
    <!-- Leafletjs Specific Stylesheet -->
    <link rel="stylesheet" href="../../assets/css/leaflet/leaflet.css"/>

    <title>SQLite Basics Tutorial</title>
</head>
<body>
<?php
/* create app folder */

/* create the composer.json file
 *
 * {
 *   "autoload": {
 *       "psr-4": {
 *           "App\\": "app/"
 *       }
 *   }
 * }
 */
/* create a database connection to phpsqlite.db */
/* http://www.sqlitetutorial.net/sqlite-php/ */

$pdo = (new SQLiteConnection())->connect();
if ($pdo != null) {
    $errors[]= 'Connected to the SQLite database successfully!';
} else {
    $errors[]= 'Whoops, could not connect to the SQLite database!';
}

/* if the table does not exist, then create it */
$sqlite = new Projects($pdo);
// create new tables
$sqlite->createTable();
// get the table list
$tables = $sqlite->getTableList();
?>

<div class="container">
    <div class="page-header">
        <h1>PHP SQLite save data to small database</h1>
    </div>

    <?php
    foreach ($errors as $message){
        echo "<div class='alert alert-warning'>{$message}</div>\n";
    }
    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Tables in Database</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tables as $table) : ?>
            <tr>

                <td><?php echo $table ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    // insert the project
    $name = $_POST['project'];
    $projectId = $sqlite->insertProject($name);

    $projects = $sqlite->getProjects();
    ?>


    <table class="table table-bordered">
        <thead>
        <tr>
            <th>id</th>
            <th>Project</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?= $project->project_id; ?></td>
                <td><?= $project->title; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>



</div>
</body>
</html>