<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts'; //явное указание таблицы
    protected $guarded = []; //включить защиту 'ничего'
    //protected $fillable = []; //выключить защиту для столбца БД
}
