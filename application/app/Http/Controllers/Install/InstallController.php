<?php

namespace App\Http\Controllers\Install;

use File;
use Config;
use Session;
use PDO, Exception;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Install\InstallRequest;


class InstallController extends Controller
{
    protected $checkResults = [];

    public function __construct()
    {
        // php version check
        $this->checkPHPVersion();

        // extensions check
        $this->checkExtensions();

        // folders and files permission check
        $this->checkFolders();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load home page
        return view('install.home', $this->checkResults);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstallRequest $request)
    {
        // check extension and folder problem if has error show errorm message
        if ($this->checkResults['extensions_problem']) { // check extensions_problem
            Session::flash('extensions_error', 'Please fix error.');
            return redirect('/');
        } else if ($this->checkResults['folders_problem']) { //check folder problem
            Session::flash('folders_error', 'Please fix error.');
            return redirect('/');
        }
        // set database information
        $host = $request->host;
        $database_name = $request->database_name;
        $username = $request->username;
        $password = $request->password;

        $db = 'mysql:host=' . $host . ';dbname=' . $database_name;

        //set database connection
        try {
            $conn = new PDO($db, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            Session::flash('connection_error', $e->getMessage());
            return redirect('/')
                ->withInput();
        }

        //set database connection with current inserted data
        $defaulDB = config('database.default');
        $defaulConn = config('database.connections');
        $connData = $defaulConn[$defaulDB];
        // set database information
        $connData['host'] = $host;
        $connData['database'] = $database_name;
        $connData['username'] = $username;
        $connData['password'] = $password;
        $defaulConn[$defaulDB] = $connData;

        // configure database connection
        Config::set('database.connections', $defaulConn);

        // check table exists
        if (Schema::hasTable('users') || Schema::hasTable('password_resets') || Schema::hasTable('oauth') || Schema::hasTable('email') || Schema::hasTable('config') || Schema::hasTable('activities')) {
            Session::flash('connection_error', "Your database is not empty.");
            return redirect('/')->withInput();
        }

        $content = "APP_ENV=local\nAPP_DEBUG=true\nMAIL_DRIVER=mail\nAPP_KEY=bQwDbOcEgoDXBXpP5nqo02eBcVafUtyi\nDB_HOST=$host\nDB_DATABASE=$database_name\nDB_USERNAME=$username\nDB_PASSWORD=$password\nCACHE_DRIVER=file\nSESSION_DRIVER=file\nQUEUE_DRIVER=sync\nINSTALLED=1";

        //.env file created with content
        File::put(base_path() . '/.env', $content);

        // migrate all table
        Artisan::call('migrate:refresh', [
            '--force' => true,
        ]);
        //seed all table
        Artisan::call('db:seed', [
            '--force' => true,
        ]);

        return redirect('/');

    }

    public function checkPHPVersion() // check php version
    {
        $this->checkResults['version_problem'] = false;

        $versionCheck = version_compare(PHP_VERSION, '5.5.9');
        $this->checkResults['php_version'] = ['version' => phpversion(), 'actual' => $versionCheck];

        // version check
        if (!$versionCheck) {
            $this->checkResults['version_problem'] = true;
        }
        return true;
    }

    public function checkExtensions() // check checkExtensions
    {
        $this->checkResults['extensions_problem'] = false;

        // extension information
        $extensions = array(
            array('name' => 'fileinfo', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/book.fileinfo.php'),
            array('name' => 'mbstring', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/book.mbstring.php'),
            array('name' => 'pdo', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/book.pdo.php'),
            array('name' => 'pdo_mysql', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/ref.pdo-mysql.php'),
            array('name' => 'gd', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/book.image.php'),
            // array('name' => 'Mcrypt', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/book.mcrypt.php'),
            array('name' => 'mysql_real_escape_string', 'type' => 'extension', 'expected' => false, 'link' => 'http://php.net/manual/en/function.mysql-real-escape-string.php'),
            array('name' => 'curl', 'type' => 'extension', 'expected' => true, 'link' => 'http://php.net/manual/en/book.curl.php'),
        );

        $problem = false;

        foreach ($extensions as &$ext) {
            if ($ext['type'] === 'function') { // if extension type is function
                $loaded = function_exists($ext['name']);
            } else { //
                $loaded = extension_loaded($ext['name']);
            }
            // if doesn't match the requirement
            if ($loaded !== $ext['expected']) {
                $problem = true;
            }

            $ext['actual'] = $loaded;
        }

        $this->checkResults['extensions'] = $extensions;
        $this->checkResults['extensions_problem'] = $problem;

        return true;
    }

    public function checkFolders() // check folder permission
    {
        $this->checkResults['folders_problem'] = false;

        $dirs = array('/../application', 'storage', 'storage/app', 'storage/framework', 'storage/framework/sessions', 'storage/framework/cache', 'storage/logs', 'resources/lang', 'database/migrations', 'database/seeds');

        $checked = array();

        // check folders and files permission
        foreach ($dirs as $dir) {
            $path = base_path($dir);

            $writable = is_writable($path);

            $checked[] = array('path' => realpath($path), 'writable' => $writable);

            if (!$writable) {
                $this->checkResults['folders_problem'] = true;
            }
        }

        $this->checkResults['folderWritable'] = $checked;

        return true;
    }
}
