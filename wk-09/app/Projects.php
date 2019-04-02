<?php

namespace App;

/**
 * SQLite Create Table Demo
 */
class Projects
{

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * connect to the SQLite database using given PDO object
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * create tables
     */
    public function createTable()
    {
        $commands = [
            'CREATE TABLE IF NOT EXISTS projects (
                        id      INTEGER PRIMARY KEY,
                        title   TEXT    NOT NULL
                      )'
        ];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }


    /**
     * drop table
     */
    public function dropTable()
    {
        $commands = ['DROP TABLE IF EXISTS projects;'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }

    /**
     * get the table list in the database
     */
    public function getTableList()
    {

        $stmt = $this->pdo->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }

    /**
     * Insert a new project into the projects table
     * @param string $projectName
     * @return the id of the new project
     */
    public function insertProject($projectName)
    {
        $sql = 'INSERT INTO projects(title) VALUES(:title)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $projectName);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    /**
     * Get all projects as an array
     * @return type
     */
    public function getProjectsAsArray()
    {
        $stmt = $this->pdo->query('SELECT project_id, title '
                                  . 'FROM projects');
        $projects = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $projects[] = [
                'project_id' => $row['project_id'],
                'title'      => $row['title']
            ];
        }
        return $projects;
    }

    /**
     * Get the project as an object list
     * @return an array of Project objects
     */
    public function getProjects()
    {
        $stmt = $this->pdo->query('SELECT project_id, title '
                                  . 'FROM projects');

        $projects = [];
        while ($project = $stmt->fetchObject()) {
            $projects[] = $project;
        }

        return $projects;
    }

    /**
     * Get the number of projects
     * @return an integer count of projects
     */
    public function getProjectCount()
    {
        $stmt = $this->pdo->query('SELECT count(project_id) FROM projects');
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    /**
     * Delete the project by project id
     * @param int $projectId
     * @return int the number of rows deleted
     */
    public function deleteProject($projectId)
    {
        $sql = 'DELETE FROM projects '
            . 'WHERE project_id = :project_id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':project_id' => $projectId]);

        return $stmt->rowCount();
    }

    /**
     * Get all projects as an array
     * @param   $name   string
     * @return  type
     */
    public function findProject($name = '')
    {
        if ($name > '') {
            $sql = 'SELECT * FROM projects WHERE title = :name';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':name',$name, \PDO::PARAM_STR);
            return $stmt->execute();
        }
        return false;
    }

}