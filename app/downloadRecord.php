<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class downloadRecord extends Model
{
    protected $table = 'download_record';


    protected $fillable = [
        'record_id',
        'children_id',
        'storybookID',
        'download_date',
        'languageCode',
        
    ];
}
