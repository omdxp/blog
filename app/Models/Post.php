<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", now()->addSeconds(20), function () use ($path) {
            return file_get_contents($path);
        });
    }

    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return collect($files)->map(function ($file) {
            return file_get_contents($file);
        });
    }
}
