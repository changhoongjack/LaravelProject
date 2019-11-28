<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    //use SoftDeletes;

    protected $table = 'feedback';
    protected $primarykey = 'FeedbackID';
    public $incrementing = false;
    // protected $keyType = 'string';
    public $timestamps = false;

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
        'FeedbackID',
        'Issue',
        'Description',
        'Rating',

    ];
}