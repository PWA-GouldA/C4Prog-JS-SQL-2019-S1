<?php

namespace App;
use PDO;
use PDOException;

/**
 * SQLite Create Table Demo
 */
class Tasks
{

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * connect to the SQLite database
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
            'CREATE TABLE IF NOT EXISTS tasks (
                    id              INTEGER         PRIMARY KEY,
                    name            VARCHAR (255)   NOT NULL,
                    completed       INTEGER         NOT NULL,
                    start_date      TEXT,
                    completed_date  TEXT,
                    project_id      INTEGER,
                    FOREIGN KEY (project_id)
                    REFERENCES projects(project_id) ON UPDATE CASCADE
                                                    ON DELETE CASCADE
                    );'
        ];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }


    /**
     * drop table
     */
    public function dropTable() {
        $commands = ['DROP TABLE IF EXISTS tasks;'];
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
     * Insert a new task into the tasks table
     * @param type $taskName
     * @param type $startDate
     * @param type $completedDate
     * @param type $completed
     * @param type $projectId
     * @return int id of the inserted task
     */
    public function insertTask($taskName, $startDate, $completedDate, $completed, $projectId)
    {
        $sql = 'INSERT INTO tasks(task_name,start_date,completed_date,completed,project_id) '
            . 'VALUES(:task_name,:start_date,:completed_date,:completed,:project_id)';

        $stmt = $this->pdo->prepare($sql);
        var_dump(var_dump($stmt,$this->pdo));
        $stmt->bindValue(':task_name',$taskName, PDO::PARAM_STR);
        $stmt->bindValue(':start_date',$startDate, PDO::PARAM_STR);
        $stmt->bindValue(':completed_date',$completedDate, PDO::PARAM_STR);
        $stmt->bindValue(':completed',$completed, PDO::PARAM_STR);
        $stmt->bindValue(':project_id',$projectId, PDO::PARAM_INT);

        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    /**
     * Get the project as an object list
     * @return an array of Project objects
     */
    public function getTasks()
    {
        $stmt = $this->pdo->query(
            'SELECT  
                task_id, task_name, completed_date, completed, project_id 
            FROM 
                tasks;');

        $tasks = [];
        while ($task = $stmt->fetchObject()) {
            $tasks[] = $task;
        }

        return $tasks;
    }

    /**
     * Get all tasks, from all projects
     * @return type
     */
    public function getTasksAsArray()
    {
        $stmt = $this->pdo->query(
            'SELECT 
                task_id, task_name, completed_date, completed, project_id 
            FROM 
                tasks;'
        );
        $tasks = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = [
                'task_id'        => $row['task_id'],
                'task_name'      => $row['task_name'],
                'completed_date' => $row['completed_date'],
                'completed'      => $row['completed'],
                'project_id'     => $row['project_id'],
            ];
        }
        return $tasks;
    }


    /**
     * Get the number of tasks
     * @return int
     */
    public function getTaskCount()
    {

        $stmt = $this->db->prepare('SELECT COUNT(*) 
                                    FROM tasks');
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /**
     * Get tasks by the project id
     * @param int $projectId
     * @return an array of tasks in a specified project
     */
    public function getTaskByProject($projectId)
    {
        // prepare SELECT statement
        $stmt = $this->pdo->prepare('SELECT task_id,
                                            task_name,
                                            start_date,
                                            completed_date,
                                            completed,
                                            project_id
                                       FROM tasks
                                      WHERE project_id = :project_id;');

        $stmt->execute([':project_id' => $projectId]);

        // for storing tasks
        $tasks = [];

        while ($row = $stmt->fetchObject()) {
            $tasks[] = $row;
        }

        return $tasks;
    }

    /**
     * Get the number of tasks in a project
     * @param int $projectId
     * @return int
     */
    public function getTaskCountByProject($projectId)
    {

        $stmt = $this->db->prepare('SELECT COUNT(*) 
                                    FROM tasks
                                   WHERE project_id = :project_id;');
        $stmt->bindParam(':project_id', $projectId);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /**
     * Delete a task by task id
     * @param int $taskId
     * @return int the number of rows deleted
     */
    public function deleteTask($taskId)
    {
        $sql = 'DELETE FROM tasks '
            . 'WHERE task_id = :task_id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':task_id', $taskId);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * Delete all tasks associated with a project
     * @param int $projectId
     * @return int the number of rows deleted
     */
    public function deleteTaskByProject($projectId)
    {
        $sql = 'DELETE FROM tasks '
            . 'WHERE project_id = :project_id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':project_id' => $projectId]);

        return $stmt->rowCount();
    }

    /**
     * Mark a task specified by the task_id completed
     * @param type $taskId
     * @param type $completedDate
     * @return bool true if success and falase on failure
     */
    public function completeTask($taskId, $completedDate)
    {
        // SQL statement to update status of a task to completed
        $sql = "UPDATE tasks "
            . "SET completed = 1, "
            . "completed_date = :completed_date "
            . "WHERE task_id = :task_id";

        $stmt = $this->pdo->prepare($sql);

        // passing values to the parameters
        $stmt->bindValue(':task_id', $taskId);
        $stmt->bindValue(':completed_date', $completedDate);

        // execute the update statement
        return $stmt->execute();
    }


}