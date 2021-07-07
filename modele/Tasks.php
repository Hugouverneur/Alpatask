<?php

class Tasks {
    public final function __construct(){}

    public function initTaskCreation() {
        $this->task_description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_MAGIC_QUOTES);
        $this->task_difficulty = filter_input(INPUT_POST, 'difficulty', FILTER_SANITIZE_MAGIC_QUOTES);
        $this->task_severity = filter_input(INPUT_POST, 'severity', FILTER_SANITIZE_MAGIC_QUOTES);
        $this->user_id = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_MAGIC_QUOTES);
        $this->group_id = filter_input(INPUT_POST, 'groupid', FILTER_SANITIZE_MAGIC_QUOTES);
    }

    public function createTask() {
        global $Db;
        if($this->group_id == '') {
            $sql = "INSERT INTO tasks (task_description, task_difficulty, task_severity, task_user_id, task_reference_group_id, task_status)
                    VALUES ('$this->task_description', $this->task_difficulty, $this->task_severity, $this->user_id, NULL, 0)";
        } else {
            $sql = "INSERT INTO tasks (task_description, task_difficulty, task_severity, task_reference_group_id, task_status)
                VALUES ('$this->task_description', $this->task_difficulty, $this->task_severity, $this->group_id, 0)";
        }
        
        $req = $Db->query($sql);
        $res = $req->fetch();
    }

    public function modifyTask($task_id) {
        global $Db;
        $sql = "UPDATE tasks 
                SET task_description = '$this->task_description',
                   ,task_difficulty = $this->task_difficulty,
                WHERE task_id = $task_id";
        //$req = $Db->query($sql);
        //$res = $req->fetch();
        echo $sql;
    }

    public function endTask($task_id) {
        global $Db;
        $sql = "UPDATE tasks 
                SET task_status = 1
                WHERE task_id = $task_id";
        //$req = $Db->query($sql);
        //$res = $req->fetch();
        echo $sql;
    }

    public function getGroupTasksList($group_id) {
        global $Db;
        $sql = "SELECT t.task_description, t.task_difficulty, t.task_severity, t.task_status
                FROM tasks AS t
                    INNER JOIN groups  AS g ON g.group_id = t.task_reference_group_id
                WHERE g.group_id = $group_id";
        $req = $Db->query($sql);
        $res = $req->fetchAll();

        return $res;
    }

    public function getUserTasksList($user_id) {
        global $Db;
        $sql = "SELECT t.task_description, t.task_difficulty, t.task_severity, t.task_status, g.group_name
                FROM tasks AS t
                    INNER JOIN users AS u ON u.user_id = t.task_user_id
                    LEFT JOIN groups AS g ON g.group_id = t.task_reference_group_id
                WHERE u.user_id = $user_id";
        $req = $Db->query($sql);
        $res = $req->fetchAll();

        return $res;
    }
}

?>