<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table ='events';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'date',
        'time',
        'cost',
        'available_tickets',
        'venue',
        'venue_location',
        'venue_phone',
        'meta_tags',
        'meta_description',
        'image',
        'cat_id',
    ];
    public function eventCategories(){
        return $this->belongsTo(EventCategory::class,'cat_id','id');
    }
}
