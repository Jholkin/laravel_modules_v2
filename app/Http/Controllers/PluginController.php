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
        $path = base_path();
        $output = shell_exec('cd ..\\Modules && git clone ' . $url);   
        echo "<pre>$output</pre>";
    }
}
