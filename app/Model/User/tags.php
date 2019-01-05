<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\Model\User\news','news_tags')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
