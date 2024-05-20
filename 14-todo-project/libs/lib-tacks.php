<?php
defined('BASE_PATH') or die("Permision Denied!");

#region Functions Folders
function getFolders()
{
    global $pdo;

    #region Get Current User ID
    $getCurrentUserId = getCurrentUserId();
    #endregion


    $sql = "select * from folders where user_id=$getCurrentUserId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function delteFolder($folder_id)
{
    global $pdo;
    #region Get Current User ID
    $getCurrentUserId = getCurrentUserId();
    #endregion
    #region Query
    $sql = "delete from folders where id=$folder_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    #endregion
}
#endregion

function addFolder($folderName)
{
    global $pdo;
    $getCurrentUserId = getCurrentUserId();
    $sql = "INSERT INTO `folders` (name,user_id) VALUES (:folderName,:userID); ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folderName' => $folderName, ':userID' => $getCurrentUserId]);
    return $stmt->rowCount();
}


#region Functions Tasks
function getTasks()
{
    global $pdo;

    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " and folder_id=$folder";
    }
    #region Get Current User ID
    $getCurrentUserId = getCurrentUserId();
    #endregion


    $sql = "select * from tasks where user_id=$getCurrentUserId $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function delteTask($task_id)
{
    global $pdo;
    #region Get Current User ID
    $getCurrentUserId = getCurrentUserId();
    #endregion
    #region Query
    $sql = "delete from tasks where id=$task_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    #endregion
}

#endregion