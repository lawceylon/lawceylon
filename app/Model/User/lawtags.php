<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class lawtags extends Model
{
    public function laws()
    {
        return $this->belongsToMany('App\Model\User\laws','laws_tags')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}
