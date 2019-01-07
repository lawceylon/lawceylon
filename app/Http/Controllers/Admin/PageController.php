<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use App\Model\Admin\AdminMessageLawyer;
use App\Model\Admin\AdminMessageClient;
use App\Model\message;

class PageController extends Controller
{
    public function index()
    {
        $lawyers = Lawyer::where('checked',1)->get();
        $lwyrs = count($lawyers);
        $users = User::where('role','user')->get();
        $usrs = count($users);
        $unregistered = Lawyer::where('checked',0)->get();
        $unregistrd = count($unregistered);
        $lmessages = AdminMessageLawyer::all();
        $lmessage = count($lmessages);
        $umessages = AdminMessageClient::all();
        $umessage = count($umessages);
        $cmessages = message::all();
        $cmessage = count($cmessages);
        return view('admin.home',compact('lwyrs','usrs','unregistrd','lmessage','umessage','cmessage'));
    }
}
