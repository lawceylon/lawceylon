<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\categories;
use App\Model\User\news;
use App\Model\Lawyer\Lawyer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyr = Lawyer::where('checked', 1 );
        $lawyers = $lawyr->whereHas('ratings', function($query) {
            $query->selectRaw('AVG(rating) rt, rateable_id')->groupBy('rateable_id')->orderBy('rt','desc')->limit(2);
        })->get();
        $categories = categories::all();
        $newses = news::where('status',1)->paginate(8);
        $newsrecents = news::orderBy('created_at', 'desc')->paginate(8);
        return view('home',compact('newses','newsrecents','categories','lawyers'));
    }
}
