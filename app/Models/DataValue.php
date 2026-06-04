<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataValue extends Model
{
    use HasFactory;


    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'title4',
        'data1',
        'data2',
        'data3',
        'data4',
        'value1',
        'value2',
        'value3',
        'value4',
    ];
}
