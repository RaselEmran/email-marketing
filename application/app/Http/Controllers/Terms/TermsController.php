<?php

namespace App\Http\Controllers\Terms;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Config\Config;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // load terms of service
        return view('terms.privacy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dataExistId = Config::where('key', 'privacy')->pluck('id');
        if ($dataExistId) {
            $data['key'] = 'privacy';
            $data['value'] = $request->privacy;
            Config::where('id', $dataExistId)->update($data);
        } else {
            $data['key'] = 'privacy';
            $data['value'] = $request->privacy;
            Config::create($data);
        }
        return \Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function storeTerms(Request $request)
    {
        $dataExistId = Config::where('key', 'termCondition')->pluck('id');
        if ($dataExistId) {
            $data['key'] = 'termCondition';
            $data['value'] = $request->termCondition;
            Config::where('id', $dataExistId)->update($data);
        } else {
            $data['key'] = 'termCondition';
            $data['value'] = $request->termCondition;
            Config::create($data);
        }
        return \Redirect::back();
    }
}
