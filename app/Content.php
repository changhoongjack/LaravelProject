<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    //use SoftDeletes;

    protected $table = 'storybook';
    protected $primaryKey = 'storybookID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
        'storybookID',
        'storybookTitle',
        'storybookCover',
        'storybookDesc',
        'storybookGenre',
        'dateOfCreation',
        'status',
        'ContributorID',
        'rating',
        'languageCode',
        'Comments,'
    ];
}
