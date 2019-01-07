<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Gassette;
use Illuminate\Support\Facades\Input;

class GassetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gassettes = Gassette::all();
        return view('admin.gassettes.index',compact('gassettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gassettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gassette = new Gassette();

        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
            'pdf' => 'required',
        ]);

        $pdf = $request->file('pdf');
        $filename = null;

        if (Input::hasFile('pdf')) {
            
            $filename = time().'.'.$pdf->getClientOriginalName();

            if (Input::file('pdf')->move('gassettes/',$filename)) {
                // File successfully saved to permanent storage
            } else {
                // Failed to save file, perhaps dir isn't writable. Give the user an error.
            }
        
        }

        
        $gassette->name = $request->name;
        $gassette->subject = $request->subject;
        $gassette->file = $filename;
        $gassette->save();
    
        return redirect(route('gassettes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gassette = Gassette::where('id',$id)->first();
        return view('admin.gassettes.show',compact('gassette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gassette = Gassette::where('id',$id)->first();
        // return($gassette);
        return view('admin.gassettes.edt',compact('gassettes'));
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
        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
        ]);

        $gassette = Gassette::find($id);
        $gassette->name = $request->name;
        $gassette->subject = $request->subject;
        $gassette->save();

        return redirect(route('gassettes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gassette::where('id',$id)->delete();
        return view('admin.unregister');
        // return redirect()->back();
    }
}
