<?php

namespace App\Models\task;

use Illuminate\Database\Eloquent\Model;

class taskdetails extends Model
{
    protected $connection = 'serviceRequestDB';
    protected $table = 'taskdetails';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'price',
        'details',
        'publis',
    ];
}
