<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Response;
use Log;

class ApiController extends Controller
{
    public function source($id, $file) {
    	$path = storage_path("app/articles/$id/$file");

        if (!File::exists($path)) {
            return;
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }

    public function upload() {
        Log::info('test');
        return 'test';
    }
}
