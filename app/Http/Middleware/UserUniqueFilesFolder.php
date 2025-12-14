<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserUniqueFilesFolder
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // e.g. "my18files"
            $folderName = 'my' . Auth::id() . 'files';

            // Make sure the folder exists on the public disk (storage/app/public/my18files)
            if (!Storage::disk('public')->exists($folderName)) {
                Storage::disk('public')->makeDirectory($folderName);
            }

            // Tell elFinder to use THIS folder as the root
            Config::set('elfinder.roots', [[
                'driver'        => 'LocalFileSystem',
                'path'          => storage_path("app/public/{$folderName}"),
                'URL'           => "/storage/{$folderName}",
                'alias'         => 'My Files', // name shown in the sidebar
                'accessControl' => 'Barryvdh\Elfinder\Elfinder::checkAccess',
            ]]);
        }

        return $next($request);
    }
}
