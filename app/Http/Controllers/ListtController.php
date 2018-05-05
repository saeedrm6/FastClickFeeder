<?php

namespace App\Http\Controllers;

use App\Listt;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Listt  $listt
     * @return \Illuminate\Http\Response
     */
    public function show(Listt $listt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listt  $listt
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$list_id)
    {
        if (Gate::allows('isadmin')){
            $menu = Menu::find($id);
            $status = $menu->listts->where('id',$list_id)->all();
            $menu = Menu::find($id)->name;
            if (count($status)>0){
                $list = Listt::find($list_id);
                return view('dashboard.editlist',compact('list','menu'));
            }
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listt  $listt
     * @return \Illuminate\Http\Response
     */
    public function update($list_id,Request $request)
    {
        if (Gate::allows('isadmin')){
            $list = Listt::find($list_id);
            $list->update($request->all());
            return back();
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listt  $listt
     * @return \Illuminate\Http\Response
     */
    public function destroy($list_id)
    {
        $list = Listt::find($list_id);
        $list->delete();
        return redirect(route('adminpanel.index'));
    }

    public function deactive(Request $request)
    {
        $list = Listt::find($request->list_id);
        $list->status = 'inherit';
        $list->update();
        return back();
    }

    public function republish(Request $request)
    {
        $list = Listt::find($request->list_id);
        $list->status = 'publish';
        $list->update();
        return back();
    }
}
