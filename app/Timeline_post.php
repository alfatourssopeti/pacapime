<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline_post extends Model
{
    protected $table = 'timeline_post';
    protected $fillable = [
        'name','year','desc','timeline_id','label','label_isactive'
    ];
}
