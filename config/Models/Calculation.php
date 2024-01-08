<?php

namespace config\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calculation extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "calculations";
    protected $guarded = [];


}
