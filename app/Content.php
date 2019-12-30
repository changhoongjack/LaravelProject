<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Builder;

class Content extends Model
{
    //use SoftDeletes;

    protected $table = 'storybook';
    protected $primaryKey = 'languageCode';

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $query
    //         ->where('storybookID', '=', $this->getAttribute('storybookID'))
    //         ->where('languageCode', '=', $this->getAttribute('languageCode'));
    //     return $query;
    // }

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
