<?php

namespace App\Http\Controllers\Translation;

use File;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Translation\Locale;
use App\Models\Translation\Language;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TranslationController extends Controller
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
    public static function langFiles()
    {
        return ['auth', 'common', 'pagination', 'passwords'];
    }


    public function index(Request $request)
    {
        $pageName = trans('common.Translation').' '.trans('common.Settings');
        // get all local
        $locals = Locale::lists('name', 'locale');
        // get all language from database
        $languages = Language::all();
        // get directory
        $dirs = self::langFiles();

        // count total translation
        $totalTrans = self::getLangDirNumber('en_US');
        
        if (!empty(Input::get('fileName'))) { // if file name is exist
            $localeName = Input::get('locale'); //locale name like en = english, bn = bengali, dn = danish
            $fileName = Input::get('fileName'); // get filename from input
            $langNames = Lang::get($fileName);
            $trans = base_path() . '/resources/lang/' . $localeName . '/' . $fileName . '.php';
            if (File::exists($trans)) {
                $trans = File::getRequire($trans);
            }

            return view('translation/lang_form', get_defined_vars());
        } else {
            if (!empty(Input::get('locale'))) {
                return view('translation/allFiles', get_defined_vars());
            }
        }
        return view('translation.home', get_defined_vars());
    }

    public static function getLangDirNumber($locale, $fileName = null)
    {
        $number = 0;

        if (File::exists(base_path() . '/resources/lang/' . $locale)) {

            if($fileName){
                $filePath = base_path() . '/resources/lang/' . $locale . '/' . $fileName.'.php';
                if (File::exists($filePath)) {
                    $number += count(File::getRequire($filePath));
                }
            } else {
                foreach (File::allFiles(base_path() . '/resources/lang/' . $locale . '/') as $file) {

                    if (File::exists($file)) {
                        if(strpos($file, 'validation.php') === false ) {
                            $number += count(File::getRequire($file));
                        }
                    }
                }
            }
        }
        return $number;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Language $model)
    {

        $validator = Validator::make($request->all(), [
            'locale' => 'required|unique:languages'
        ]);

        if ($validator->fails()) {
            Session::flash('error_msg', 'This Languages has already added.');
            return redirect('translation')
                ->withErrors($validator)
                ->withInput();

        }

        $allRequest = $request->all();
        $allRequest['status'] = 1;

        $model->create($allRequest);

        Session::flash('success_msg', 'Language added successfully');
        return redirect('translation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'die';
    }

    public function updateLanguage($id)
    {

        $lan = Language::find($id);
        if ($lan->status == 1) {
            $lan->status = 0;
        }else{
            $lan->status = 1;
        }
        $lan->save();
        Session::flash('success_msg', 'Language successfully updated');
        return redirect('translation');
    }

    public function getAllLanFile($id)
    {
        $pageName = trans('common.Language');
        $directory = base_path() . '/resources/lang/en_US';
        $dirs = ['common'];
        return view('translation/allFiles', get_defined_vars());
    }

    public function insertLang(Request $request)
    {
        $localeName = $request->input('locale');
        $fileName = $request->input('fileName');

        $directory = base_path() . '/resources/lang/' . $localeName;

        if (!File::exists($directory)) {
            File::makeDirectory($directory);
        }

        $en = base_path() . '/resources/lang/en_US/' . $fileName . '.php';
        $target = base_path() . '/resources/lang/' . $localeName . '/' . $fileName . '.php';

        if (!File::exists($target)) {
            File::copy($en, $target);
        }

        $trans = array();

        foreach ($request->except(['locale', 'fileName', '_token']) as $key => $value) {
            if ($request->input($key))
                $trans[$key] = $request->input($key);
        }
        File::put($target, var_export($trans, true));
        File::prepend($target, '<?php return ');
        File::append($target, ';');

        return redirect('translation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $model)
    {
        return 'delete';
        $model->delete();
        return redirect('translation');
    }
}
