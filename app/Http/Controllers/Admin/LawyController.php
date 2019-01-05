<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lawyer\Lawyer;
use App\User;
use DB;

class LawyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyer::where('checked', 1)->get();
        return view('admin.lawyer.show',compact('lawyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lawyer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[

            'firstName'  =>'required|max:30',
            'lastName'=>'required|max:30',
            'gender'=>'required',
            'Email'=>'required|email',
            'NIC_passportNumber'=>'required',
            'barnumber'=>'required|min:10',
            'Address'=>'required',
            'password'=>'required|min:5|max:30',
            'password_confirmation' => 'required_with:password|same:password',
            'Specialist_Area'=>'required',
            'Experience_Period'=>'required',
            'TP_Number'=>'required|min:10',
           
        ]);

        /*checking whether there already exists the registered lawyer*/ 
        $user=$request->get('Email');
        $email=DB::table('lawyers')->where([ ['email', '=', $user],['checked', '=', 1],])->count();
        if($email){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');
        }

        $lawyer = new Lawyer();
        $lawyer->honorific = $request->honorific;
        $lawyer->firstName = $request->firstName;
        $lawyer->lastName = $request->lastName;
        $lawyer->gender = $request->gender;
        $lawyer->Email = $request->Email;
        $lawyer->NIC_passportNumber = $request->NIC_passportNumber;
        $lawyer->barnumber = $request->barnumber;
        $lawyer->Address = $request->Address;
        $lawyer->Specialist_Area = $request->Specialist_Area;
        $lawyer->Experience_Period = $request->Experience_Period;
        $lawyer->TP_Number = $request->TP_Number;
        $lawyer->consultationFee = $request->consultationFee;
        $lawyer->checked = 1;
        $lawyer->password = $request->password;
        $lawyer->save();

        return redirect(route('lawyer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.lawyer.edit',compact('lawyer'));
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
        $this->validate($request ,[

            'firstName'  =>'required|max:30',
            'lastName'=>'required|max:30',
            'gender'=>'required',
            'Email'=>'required|email',
            'NIC_passportNumber'=>'required',
            'barnumber'=>'required|min:10',
            'Address'=>'required',
            'password'=>'required|min:5|max:30',
            'password_confirmation' => 'required_with:password|same:password',
            'Specialist_Area'=>'required',
            'Experience_Period'=>'required',
            'TP_Number'=>'required|min:10',
           
        ]);

        /*checking whether there already exists the registered lawyer*/ 
        $user=$request->get('Email');
        $email=DB::table('lawyers')->where([ ['email', '=', $user],['checked', '=', 1],])->count();
        if($email){
            return redirect()->back()->with('message', 'Lawyer already exists!!!');
        }

        $lawyer = Lawyer::find($id);
        $lawyer->honorific = $request->honorific;
        $lawyer->firstName = $request->firstName;
        $lawyer->lastName = $request->lastName;
        $lawyer->gender = $request->gender;
        $lawyer->Email = $request->Email;
        $lawyer->NIC_passportNumber = $request->NIC_passportNumber;
        $lawyer->barnumber = $request->barnumber;
        $lawyer->Address = $request->Address;
        $lawyer->Specialist_Area = $request->Specialist_Area;
        $lawyer->Experience_Period = $request->Experience_Period;
        $lawyer->TP_Number = $request->TP_Number;
        $lawyer->consultationFee = $request->consultationFee;
        $lawyer->checked = 1;
        $lawyer->password = $request->password;
        $lawyer->save();

        return redirect(route('lawyer.index'));
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
