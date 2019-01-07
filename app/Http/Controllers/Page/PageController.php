<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User\laws;
use App\Model\User\lawtags;
use App\Model\User\lawcategories;
use App\Model\User\news;
use App\Model\User\like;
use App\Model\User\categories;
use App\Model\User\tags;
use App\Model\User\Gassette;
use App\Model\Lawyer\Lawyer;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\contactUs;
use App\Model\message;
use App\User;

class PageController extends Controller
{
    public function index()
    {
        $lawyr = Lawyer::where('checked', 1 );
        $lawyers = $lawyr->whereHas('ratings', function($query) {
            $query->selectRaw('AVG(rating) rt, rateable_id')->groupBy('rateable_id')->orderBy('rt','desc');
        })->take(8)->get();
        $categories = categories::all();
        $newsrecents = news::orderBy('created_at','DESC')->paginate(8);
        $newschoices = news::where('status',1)->orderBy('created_at','DESC')->paginate(8);
        return view('main.home',compact('newschoices','newsrecents','categories','lawyers'));
    }

    public function laws()
    {
        $laws = laws::orderBy('created_at','DESC')->paginate(8);
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        return view('main.staticlaws',compact('laws','lawtags','lawcategories'));
    }

    public function news(news $news)
    {
        $recents = news::orderBy('updated_at','desc')->limit(5)->get();
        $categories = categories::all();
        $tags = tags::all();
        return view('main.newspage',compact('news','categories','tags','recents'));
    }

    public function lawcontent(laws $laws)
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        return view('main.lawpage',compact('laws','lawtags','lawcategories'));
    }

    public function tag(tags $tags)
    {
        $category = categories::all();
        $tag = tags::all();
        $news = $tags->news();
        return view('main.cattags',compact('news','category','tag'));
    }

    public function category(categories $categories)
    {
        $category = categories::all();
        $tag = tags::all();
        $news = $categories->news();
        return view('main.cattags',compact('news','category','tag'));
    }

    public function lawtag(lawtags $lawtgs)
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        $laws = $lawtgs->laws();
        return view('main.lawcattags',compact('laws','lawcategories','lawtags'));
    }

    public function lawcategory(lawcategories $lawcategry)
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        $laws = $lawcategry->laws();
        return view('main.lawcattags',compact('laws','lawcategories','lawtags'));
    }

    public function lawsearch(Request $request)
    {
        $lawcategories = lawcategories::all();
        $lawtags = lawtags::all();
        $laws = laws::lawsearch($request->keyword);
        return view('main.lawcattags',compact('laws','lawcategories','lawtags'));
    }

    public function newsearch(Request $request)
    {
        $category = categories::all();
        $tag = tags::all();
        $news = news::newsearch($request->keyword);
        return view('main.cattags',compact('news','category','tag'));
    }

    public static function getLawyers()
    {
    	$lawyers = DB::table('lawyers')->where('checked',1)->get();
        return view('main.search',['lawyers'=>$lawyers]);
    
    }

    public static function reg()
    {
        return view('main.register');
    
    }

    public function contactUs(){
        return view('main.contactus');
    }

    public static function getaboutUs()
    {
        return view('main.aboutUs');
    }
    
    public function contactUsSave(Request $request){
        $name=$request->get('name');
        $email=$request->get('email');
        $subject=$request->get('subject');
        $message=$request->get('message');
        $txt=new contactUs(['name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message]);
        $txt->save();
        return redirect()->back()->with('message','your message has been sent.....');
    }

    public static function getdownloads()
    {
        return view('main.downld');
    }

    public function get()
    {
        $lawyr = Lawyer::where('checked', 1 );
        $contacts = $lawyr->whereHas('ratings', function($query) {
            $query->selectRaw('AVG(rating) rt, rateable_id')->groupBy('rateable_id')->orderBy('rt','desc')->limit(8);
        })->get();
        return response()->json($contacts);
    }

    public function chat()
    {
        return view('main.chat');
    }
    public function vediochat()
    {
        return view('main.vediochat');
    }

    public function getMessagesFor($id)
    {
        $messages = message::where('from',$id)->orWhere('to',$id)->get();
        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        return response()->json($message);
    }

    public function gassette()
    {
        $gassettes = Gassette::orderBy('created_at','DESC')->paginate(12);
        return view('main.gassette',compact('gassettes'));
    }

    public function gassetteView($id)
    {
        $gassette = Gassette::where('id',$id)->first();
        return view('main.gassetteView',compact('gassette'));
    }

}