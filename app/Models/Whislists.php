<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislists extends Model
{
    protected $dates = ['deleted_at'];

    protected $table = 'whislists';
    protected $primaryKey = 'idwhislists';

    protected $fillable = [
        'idclass'
    ];

    // public function class_belong()
    // {
    //     return $this->belongsTo('App\Models\Classes','idclass');
    // }

    // public function users()
    // {
    //     return $this->belongsTo('App\Models\User', 'idusers');
    // }

}
