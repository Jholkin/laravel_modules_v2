<?php

function list_dirs($path)
{
    $dirs = [];
    if(is_dir($path)) {
        if($dir = opendir($path)) {
            while (($file = readdir($dir)) != false) {
                if(is_dir($path."/".$file) && $file != "." && $file != "..") {
                    array_push($dirs,$file);
                    list_dirs($path."/".$file."/");
                }
            }
        }
        closedir($dir);
    }

    return $dirs;
}

function delete_dir($path)
{
    $it = new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS);
    $it = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
    foreach($it as $file) {
        //dd($file);
        if ($file->isDir()) rmdir($file->getPathname());
        else unlink($file->getPathname());
    }
    return rmdir($path) ? true : false;
}