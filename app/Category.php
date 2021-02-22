<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guard =[];
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belogsTo('App\Category', 'parent_id', 'id');
    }
}
