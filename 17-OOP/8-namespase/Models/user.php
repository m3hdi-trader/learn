<?php

namespace App\Models;

include "base-model.php";

class User extends BaseModel
{
    public function __construct()
    {
        echo "New" . __NAMESPACE__ . "\User created!!" . PHP_EOL;
    }
}
