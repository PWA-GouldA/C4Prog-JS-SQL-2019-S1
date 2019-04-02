<?php
/* Add the autoloading of application code to the file */
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\Projects;
use App\Tasks;
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS file included -->
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"/>
    <!-- FontAwesome 5 Free CSS file included -->
    <link rel="stylesheet" href="../assets/css/fontawesome/all.min.css"/>
    <!-- Cert 4 Programming Specific Stylesheet -->
    <link rel="stylesheet" href="../assets/css/c4prog.css"/>
    <!-- Leafletjs Specific Stylesheet -->
    <link rel="stylesheet" href="../assets/css/leaflet/leaflet.css"/>

    <title>SQLite Basics Tutorial</title>
</head>
<body>
<?php
$conn = new SQLiteConnection();
$pdo = $conn->connect();
if ($pdo != null) {
    $errors[] = 'Connected to the SQLite database successfully!';
} else {
    $errors[] = 'Whoops, could not connect to the SQLite database!';
}

?>

<div class="container">
    <div class="page-header">
        <h1>Seed Database</h1>
    </div>

    <?php
    foreach ($errors as $message) {
        echo "<div class='alert alert-warning'>{$message}</div>\n";
    }
    ?>
    <?php

    $liteProject = new Projects($pdo);
    $liteProject->createTable();

    $taskLite = new Tasks($pdo);
    $taskLite->createTable();

    /* SEED DATABASE TABLES */
    $tasks =
        [
            [
                'title'   => 'Little Project',
                'task_name'      => '',
                'completed'      => '',
                'start_date'     => '',
                'completed_date' => '',
            ],
            [
                'title'   => 'Mastering SQLite',
                'task_name'      => '',
                'completed'      => '',
                'start_date'     => '',
                'completed_date' => '',
            ],
            [
                'title'   => 'Little Project',
                'task_name'      => 'Dummy task',
                'completed'      => '0',
                'start_date'     => '2019-06-02',
                'completed_date' => '',
            ],

        ];
    foreach ($tasks as $task) {
        echo "<p>{$task['title']}";
        $projectID = $liteProject->findProject($task['title']);
        echo " [{$projectID}]</p>";

        if (is_null($projectID)) {
            $projectID = $liteProject->insertProject($task['title']);
        }

        if ($task['task_name'] != '') {
            $taskLite->insertTask($task['task_name'],
                                $task['start_date'],
                                $task['completed_date'],
                                $task['completed'],
                                $projectID);
        }

    }



    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Project</th>
            <th>Tasks</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tables as $table) : ?>
            <tr>
                <td><?php echo $table ?></td>
                <td><?php echo $table ?></td>
                <td><?php echo $table ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    // insert the project
    $name = $_POST['project'];
    $projectId = $sqlite->insertProject($name);

    $projects = $sqlite->getProjectObjectList();
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