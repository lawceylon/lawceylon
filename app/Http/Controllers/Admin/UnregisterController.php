<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use DB;
use Carbon\Carbon;

class UnregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyer::where('checked', 0)->get();
        return view('admin.unregister.show',compact('lawyers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lawyer = Lawyer::where('id',$id)->first();
        DB::table('users')->insert(
            array(
                'honorific'=>$lawyer->honorific,
                'name' =>$lawyer->firstName,
                'lastname' =>$lawyer->lastName,
                'phone'=>$lawyer->TP_Number,
                'address'=>$lawyer->Address,
                'nic'=>$lawyer->NIC_passportNumber,
                'email'=>$lawyer->Email,
                'role'=>'lawyer',
                'password'=>$lawyer->password,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            )
        );
        $user = User::where('email',$lawyer->Email)->first();
        $lawyer->checked = 1;
        $lawyer->save();
        DB::table('userlawyer')->insert(
            array(
                'user_id'=>$user->id,
                'lawyer_id' =>$lawyer->id
            )
        );
        
        return redirect()->route('lawyer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lawyer = Lawyer::where('id',$id)->first(); ;
        return view('admin.unregister.view',compact('lawyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lawyer::where('id',$id)->delete();
        return redirect()->back();
    }
}
