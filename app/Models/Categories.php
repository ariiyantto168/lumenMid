<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model 
{
    protected $dates = ['deleted_at'];

    protected $table = 'categories';
    protected $primaryKey = 'idcategories';

    protected $fillable = [
        'name',
    ];
   
}
