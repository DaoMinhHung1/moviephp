<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $users = ['name', 'email', 'password'];

    public function getName($name)
    {
        return $name;
    }
    public function setName($name)
    {
        $this->attributes['name'] = ($name);
    }


    public function getEmail($email)
    {
        return $email;
    }
    public function setEmail($email)
    {
        $this->attributes['email'] = ($email);
    }


    public function getPassword($password)
    {
        return $password;
    }
    public function setPassword($password)
    {
        $this->attributes['password'] = ($password);
    }
}
