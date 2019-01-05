<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class news extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Model\User\tags','news_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\User\categories','category_news')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->diffForHumans();
    // }

    public static function newsearch($keyword) {

        $newsByTags = news::whereHas('tags', function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $newsByCategories = news::whereHas('categories', function($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        });

        $matchingNews = news::where('title', 'like', '%' . $keyword . '%')
        ->union(news::where('subtitle', 'like', '%' . $keyword . '%'))
        ->union(news::where('slug', 'like', '%' . $keyword . '%'))
        ->union(news::where('body', 'like', '%' . $keyword . '%'));

        $matchingNews = $matchingNews->union($newsByTags)->union($newsByCategories);

        return $matchingNews->paginate(8);
    }
}
