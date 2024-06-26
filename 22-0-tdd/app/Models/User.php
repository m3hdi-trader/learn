<?php

namespace App\Models;

use App\Helpers;

class User
{
    protected $first_name;
    protected $last_name;

    public function __call($method, $params)
    {
        $property = Helpers::camelToUnderscore(substr($method, 3));

        if (property_exists($this, $property)) {
            if (substr($method, 0, 3) == 'set') {
                $this->$property = trim($params[0]);
            }
        }
        if (substr($method, 0, 3) == 'get') {
            return $this->$property;
        }
    }

    // public function setFirstName($fistName)
    // {
    //     $this->first_name = trim($fistName);
    // }

    // public function getFirstName()
    // {
    //     return $this->first_name;
    // }

    // public function setLastName($lastName)
    // {
    //     $this->last_name =  trim($lastName);
    // }

    // public function getLastName()
    // {
    //     return $this->last_name;
    // }

    public function getFullName()
    {
        return "{$this->getFirstName()} {$this->getLastName()}";
    }
}
