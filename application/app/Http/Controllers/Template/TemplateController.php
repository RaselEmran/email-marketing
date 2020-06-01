<?php

namespace App\Http\Controllers\Template;

use App\Models\Media\Media;
use App\Models\Template\Template;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //loaded email list index page
        $pageName = trans('common.template');

        $templates = Template::get();
        $medias = Media::get();
        $title = trans('common.create') . ' ' . trans('common.template');
        
        return view('template.home', get_defined_vars());
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Template::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        $templates = Template::get();
        $title = trans('common.edit') . ' ' . trans('common.template');
        return view('template.home', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Template $template, Request $request)
    {
        $template->update($request->all());
        Session::flash('success_msg', 'Successfully Updated');
        return redirect('template');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();
        Session::flash('success_msg', 'Successfully Deleted.');
        return redirect('template');
    }
}
