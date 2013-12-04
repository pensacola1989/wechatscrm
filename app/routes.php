<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	$anvil = new Acme\Product\Anvil\AnvilHeavy;
	
    return View::make('hello');
});

Route::get('testioc', 'TestController@index');

Route::get('/user', function ()
{
	$user = new User;
	$user->username = 'www';
	$user->email = 'qindongwoxin@gmail.com';
	$user->password = 'wuweiwei1989';
	
	$user->save();
});

Route::get('/getuser',function ()
{
	$ret = User::all();
	dd($ret);
});
//Route::get('/wcsite', 'website\HomeController@index');
Route::get('/wcsite', array('uses' => 'website\HomeController@index'))->before('auth');
Route::post('/wcsite',array('uses' => 'website\HomeController@saveHome'))->before('auth');

Route::get('/register', 'UserController@register')->before('guest');
Route::get('/login', 'UserController@userLogin')->before('guest');
Route::get('/admin/home', 'UserController@index');
//Route::get('/wcsite', 'WcsiteController@index');
Route::get('/dashboard', 'UserController@dashboard')->before('auth');
Route::get('/logout',function ()
{
	Auth::logout();
	return Redirect::to('login');
});

Route::post('/newuser', 'UserController@addUser');
Route::post('/checkUser','UserController@checkUser');


Route::get('upload', function() {
	$html = '<form action="/upload" method="post" enctype="multipart/form-data">';
	$html .= '<input type="file" name="up-file"/>';
	$html .= '	<input type="submit" value="upload"/>';
	$html .= '</form>';

	$html .= '<form action="/upload2" method="post" enctype="multipart/form-data">';
	$html .= '<input type="file" name="chunkfile"/>';
	$html .= '	<input type="submit" value="upload2"/>';
	$html .= '</form>';



	return $html;
});

Route::post('upload', function() {
	@set_time_limit(5 * 60);
	if(Input::hasFile('up-file')) 
	{
		$destinationPath = public_path() . '/uploadFile';
		$chunk = Input::has('chunk') ? intval(Input::get('chunk')) : 0;
		$chunks = Input::has('chunks') ? intval(Input::get('chunks')) : 0;
		$fileName = Input::has('name') ? Input::get('name') : str_random(6);
		$contentType = Request::server('HTTP_CONTENT_TYPE');
		$extension =  Input::hasFile('up-file') ? Input::file('up-file')->getClientOriginalExtension() : '';
	}
});


Route::post('upload2',function ()
{
	@set_time_limit(5 * 60);
	$uploadUrl = '/uploadFile/' . Date('Ymd');
	$targetDir = public_path() . $uploadUrl;
	//$targetDir = 'uploads';
	$cleanupTargetDir = true; // Remove old files
	$maxFileAge = 5 * 3600; // Temp file age in seconds
	$fileName = '';

	// Create target dir
	if (!file_exists($targetDir)) {
	        @mkdir($targetDir);
	}


	// Get a file name
	if (isset($_REQUEST["name"])) {
	        $fileName = $_REQUEST["name"];
	} elseif (!empty($_FILES)) {
	        $fileName = $_FILES["chunkfile"]["name"];

	} else {
	        $fileName = uniqid("file_");
	}

	$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

	// Chunking might be enabled
	$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
	$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

	// Remove old temp files        
	if ($cleanupTargetDir) {
	        if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
	                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
	        }

	        while (($file = readdir($dir)) !== false) {
	                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

	                // If temp file is current file proceed to the next
	                if ($tmpfilePath == "{$filePath}.part") {
	                        continue;
	                }

	                // Remove temp file if it is older than the max age and is not the current file
	                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
	                        @unlink($tmpfilePath);
	                }
	        }
	        closedir($dir);
	}        


	// Open temp file
	if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
	        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
	}

	if (!empty($_FILES)) {
	        if ($_FILES["chunkfile"]["error"] || !is_uploaded_file($_FILES["chunkfile"]["tmp_name"])) {
	                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded chunkfile."}, "id" : "id"}');
	        }

	        // Read binary input stream and append it to temp chunkfile
	        if (!$in = @fopen($_FILES["chunkfile"]["tmp_name"], "rb")) {
	                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	        }
	} else {        
	        if (!$in = @fopen("php://input", "rb")) {
	                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	        }
	}

	while ($buff = fread($in, 4096)) {
	        fwrite($out, $buff);
	}

	@fclose($out);
	@fclose($in);

	// Check if file has been uploaded
	if (!$chunks || $chunk == $chunks - 1) {
	        // Strip the temp .part suffix off 
	        rename("{$filePath}.part", $filePath);
	}
	return url($uploadUrl . '/' .$fileName);
	// Return Success JSON-RPC response
	//die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
});
/*
* 重命名路由，以方便在跳转的时候使用路由的名字
$url = URL::route('profile');

$redirect = Redirect::route('profile');
*/
// Route::get('/test/t/s', array('as' => 'f', function ()
// {
// 	return 'just for testing';
// }));

