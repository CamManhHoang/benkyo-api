<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prefecture_id',
        'code',
        'name',
        'slug',
        'is_display',
        'big_city_flag',
    ];
}
