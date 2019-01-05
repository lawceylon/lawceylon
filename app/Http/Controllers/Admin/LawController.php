<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\laws;
use App\Model\User\lawtags;
use App\Model\User\lawcategories;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laws = laws::all();
        return view('admin.laws.show',compact('laws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lawtags = lawtags::all();
        $lawcategories = lawcategories::all();
        return view('admin.laws.create',compact('lawtags','lawcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'subcategory1' => 'required',
            'subcategory2' => 'required',
            'body' => 'required',
            'exp' => 'required',
        ]);

        $laws = new laws();
        $laws->title = $request->title;
        $laws->subtitle = $request->subtitle;
        $laws->slug = $request->slug;
        $laws->subcategory1 = $request->subcategory1;
        $laws->subcategory2 = $request->subcategory2;
        $laws->exp = $request->exp;
        $laws->body = $request->body;
        $laws->save();

        return redirect(route('laws.index'));
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
        $law = laws::where('id',$id)->first();
        $lawtags = lawtags::all();
        $lawcategories = lawcategories::all();
        return view('admin.laws.edit',compact('lawtags','lawcategories','law'));
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
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'subcategory1' => 'required',
            'subcategory2' => 'required',
            'body' => 'required',
            'exp' => 'required',

        ]);

        $laws = laws::find($id);
        $laws->title = $request->title;
        $laws->subtitle = $request->subtitle;
        $laws->slug = $request->slug;
        $laws->subcategory1 = $request->subcategory1;
        $laws->subcategory2 = $request->subcategory2;
        $laws->exp = $request->exp;
        $laws->body = $request->body;
        $laws->lawtags()->sync($request->lawtags);
        $laws->lawcategories()->sync($request->lawcategories);
        $laws->save();

        return redirect(route('laws.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        laws::where('id',$id)->delete();
        return redirect()->back();
    }
}
