<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToMark extends Model
{
    //use SoftDeletes;

    protected $table = 'page';
    protected $primarykey = 'pageID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
     'pageID',
     'pageNo',
     'pagePhoto',
     'pageContent',
     'storybookID',
     'languageCode',
    ];
}
