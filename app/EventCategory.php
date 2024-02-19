<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    // protected $table = 'event_categories';

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function events(){
        return $this->hasMany(Event::class,'cat_id','id');
    }
}
