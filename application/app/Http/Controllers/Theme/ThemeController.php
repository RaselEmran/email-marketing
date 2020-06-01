<?php

namespace App\Http\Controllers\Theme;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Config\Config;
use App\Http\Controllers\Controller;
use Session;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //loaded theme settings page
        $pageName = trans('common.Theme').' '.trans('common.Settings');
        $config=Config::first();
        return view('Theme.home',get_defined_vars());
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

    //saved theme settings info
    public function store(Request $request)
    {
        foreach($request->except('_token') as $key=>$value ){
            $dataExistId = Config::where('key',$key)->pluck('id');
            if( $dataExistId ) {
                $data['key']   = $key;
                $data['value'] = $value;
                Config::where('id',$dataExistId)->update($data);
            }else{
                $data['key']   = $key;
                $data['value'] = $value;
                Config::create($data);
            }
        }
        return \Redirect::back();
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
        //
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
        //
    }
}
