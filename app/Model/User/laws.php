<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class laws extends Model
{
    public function lawtags()
    {
        return $this->belongsToMany('App\Model\User\lawtags','laws_tags')->withTimestamps();
    }

    public function lawcategories()
    {
        return $this->belongsToMany('App\Model\User\lawcategories','lawcategory_laws')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function lawsearch($keyword) {

        $lawsByTags = laws::whereHas('lawtags', function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $lawsByCategories = laws::whereHas('lawcategories', function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $matchingLaws = laws::where('title', 'like', '%' . $keyword . '%')
        ->union(laws::where('subtitle', 'like', '%' . $keyword . '%'))
        ->union(laws::where('slug', 'like', '%' . $keyword . '%'))
        ->union(laws::where('body', 'like', '%' . $keyword . '%'))
        ->union(laws::where('exp', 'like', '%' . $keyword . '%'))
        ->union(laws::where('subcategory1', 'like', '%' . $keyword . '%'))
        ->union(laws::where('subcategory2', 'like', '%' . $keyword . '%'));


        $matchingLaws = $matchingLaws->union($lawsByTags)->union($lawsByCategories);

        return $matchingLaws->get();
    }
}
