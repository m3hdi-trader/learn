<?php

use App\Models\User as ModelUser;
use App\Utilities\User as UtilitiesUser;

include "models/user.php";
include "utilities/user.php";



// $userModel = new \App\Models\User();
// $userUtilities = new \App\Utilities\User();

$userModel = new ModelUser();
$userUtilities = new UtilitiesUser();
