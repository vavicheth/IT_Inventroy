<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=['name','name_kh','abr','abr_kh','bed','description','active'];

}
