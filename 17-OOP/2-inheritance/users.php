<?php
include_once 'BaseModel.php';

class Uses extends BaseModel
{
    protected $table = 'users';
    // protected $primaryKey = 'id';
}

$userModel = new Uses();

$userData = $userModel->find(6);
var_dump($userData);
