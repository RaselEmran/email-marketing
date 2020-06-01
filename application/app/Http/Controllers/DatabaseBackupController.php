<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;
use DB;
use Illuminate\Support\Facades\File;
use Storage;

class DatabaseBackupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//take back file
    public function backupDownload()
    {
        if (env('APP_ENV') != 'demo') {
            Artisan::call('backup:run');
            $file = File::files(storage_path() . '/app/');
            sleep(2);
            if (File::exists($file[0])) {
                return Response::download($file[0])->deleteFileAfterSend(TRUE);
            } else {
                Session::flash('success_msg', 'No backup File');
                return redirect()->back();
            }
        } else {
            Session::flash('success_msg', 'This Feature Disable For Demo');
            return redirect()->back();
        }


    }
}
