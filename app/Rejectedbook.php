<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rejectedbook extends Model
{
    //use SoftDeletes;

    protected $table = 'rejectedbook';
    //protected $primarykey = 'pageID';
    public $incrementing = false;
    //protected $keyType = 'string';
    public $timestamps = false;

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
     'Comments',
     'Status',
    
    ];
}