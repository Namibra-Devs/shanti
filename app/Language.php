<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  protected $fillable = ['id', 'name', 'is_default', 'code', 'rtl'];

 
  public function ulinks()
  {
    return $this->hasMany('App\Ulink');
  }

   public function products()
  {
    return $this->hasMany('App\Product');
  }
  public function event_categories()
  {
    return $this->hasMany('App\EventCategory', 'lang_id');
  }
  public function events()
  {
    return $this->hasMany('App\Event', 'lang_id');
  }
}
