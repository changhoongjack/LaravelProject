<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storybooklibrary extends Model
{
    //use SoftDeletes;

    protected $table = 'storybooklibrary';
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
     'ProductionID',
     'storybookID',
     'ContributorID',
     'title',
     'Content_desc',
     'AgeType',
     'languagecode',
     'readability_lvl',
     'date_of_creation',
     'contributorEmail',
     'Remarks',
     'Status',
    
    ];
}
