<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class lawcategories extends Model
{
    public function laws()
    {
        return $this->belongsToMany('App\Model\User\laws','lawcategory_laws')->paginate(8);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
