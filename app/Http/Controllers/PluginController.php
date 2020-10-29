<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;

use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function save(Request $request)
    {
        $r = $request->all();
        $url = $r['url'];
        //$path = base_path();
        $output = shell_exec('cd ../Modules; git clone ' . $url); // by machine unix   
        //$output = shell_exec('cd ..\\Modules && git clone ' . $url);   // by machine windows
        echo "<pre>$output</pre>";
    }

    public function delete(Request $request)
    {
        $r = $request->all();
        $module = $r['module'];
        $path = base_path() . "/Modules" . "/" . $module;
        //dd($path);
        $it = new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS);
        $it = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
        foreach($it as $file) {
            //dd($file);
            if ($file->isDir()) rmdir($file->getPathname());
            else unlink($file->getPathname());
        }
        rmdir($path);
    }
}
