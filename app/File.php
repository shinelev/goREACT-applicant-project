<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'file', 'type', 'description', 'tag', 'user_id', 'created_at', 'updated_at', 'type'
    ];
}
