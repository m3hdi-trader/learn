<?php

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


#region Functions Tasks
function getTasks()
{
    global $pdo;
}

#endregion