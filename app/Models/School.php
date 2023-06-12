<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public const SCHOOL_TYPE = [
        'elementary' => 'B1',
        'middle' => 'C1',
        'senior' => 'D1',
    ];
}
