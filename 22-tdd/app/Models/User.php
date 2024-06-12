<?php

namespace App\Models;

class User
{
    protected $first_name;
    protected $last_name;
    public function setFirstName($fistName)
    {
        $this->first_name = trim($fistName);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName($lastName)
    {
        $this->last_name =  trim($lastName);
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getFullName()
    {
        return "{$this->getFirstName()} {$this->getLastName()}";
    }
}
