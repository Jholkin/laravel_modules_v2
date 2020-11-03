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
        shell_exec('cd ../Modules; git clone ' . $url); // by machine unix   
        //$output = shell_exec('cd ..\\Modules && git clone ' . $url);   // by machine windows
        return redirect('/modules');
    }
    
    public function modules()
    {
        $path = base_path() . "/Modules";
        $modules = list_dirs($path);
        //dd($modules);
        return view("modules", ["modules" => $modules]);
    }

    public function delete(Request $request, $module)
    {
        $path = base_path() . "/Modules" . "/" . $module;
        return delete_dir($path) ? redirect('/modules') : "Ha ocurrido un error al eliminar el módulo";
    }
}
