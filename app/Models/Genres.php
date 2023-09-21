<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $genres = ['name'];

    public function getName($name)
    {
        return $name;
    }
    public function setName($name)
    {
        $this->attributes['name'] = ($name);
    }
}
