<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;
// use Spatie\Backup\Tasks\Backup\Zip;
use Storage;
use Zipper;
use DB;

class BackupsController extends Controller
{

    public function index()
    {
        $backups = Storage::files('backups/http---localhost');
        $backups = array_reverse($backups);

        return view('admin.backups.index', compact('backups'));
    }

    public function make()
    {
        Artisan::call('backup:run', []);

      //  Artisan::call('db:backup --database= --destination=local --destinationPath=backup --compression=null');

        $all_zip = Storage::files('backups/http---localhost');
        $zip = end($all_zip);
        $name = explode('/', $zip);
        $name = end($name);

        $path = storage_path("app/$zip");

        return response()->download($path, $name);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required | mimes:zip'
        ]);

        $file = $request->file('file');
        $zipper = Zipper::make($file);
        $zipper->folder('/var/www/blog/storage')->extractTo(storage_path());

        $sql = $zipper->getFileContent('/db-dumps/homestead.sql');
        DB::unprepared($sql);

       return redirect()->back()->with('success', 'Images réstorées');
    }

    public function download($file)
    {
        $path = storage_path("app/backups/http---localhost/$file");

        return response()->download($path, $file);
    }

    public function delete($file)
    {
        Storage::delete("backups/http---localhost/$file");

        return redirect()->back()->with('success', 'Fichier supprimé');
    }
}
