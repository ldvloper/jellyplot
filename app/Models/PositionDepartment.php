<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'position_id',
        'department_id',
    ];
}
