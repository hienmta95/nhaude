<?php


if (!function_exists('resizeThumb')) {
    function resizeThumb($url, $width = 200, $height = 200, $fit = 'true', $extract = 'false', $fillColor = 'FFFFFF', $stretch = 'false', $quality = 100)
    {
        $filename = last(explode('/', $url));
        $filepathuploads = str_replace($filename, '', $url);
        $filepath = str_replace('uploads/', '', $filepathuploads);
        $thumbFilename = 'thumb-' . $width . '-' . $height . '-'. $filename;

        if (Storage::exists($filepath . $thumbFilename)) {
            return nhaude_asset(Storage::url($filepath . $thumbFilename));
        } else {
            try {
                // Create thumb image if it not exists
                $image = \Image::make($url)->fit($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put($filepath . $thumbFilename, $image->stream());
            } catch (\Exception $e) {
                return nhaude_asset(Storage::url($url));
            }

            return nhaude_asset(Storage::url($filepath . $thumbFilename));
        }

//         return storageUrl($url) . '?resize=w[' . $width . ']h[' . $height . ']f[' . $fit . ']e[' . $extract . ']fc[' . $fillColor . ']s[' . $stretch . ']q[' . $quality . ']';
    }
}

if (!function_exists('storageUrl')) {
    function storageUrl($path = '')
    {
        return env('MEDIA_URL') .'/'. $path;
    }
}

if (!function_exists('backendPath')) {
    function backendPath()
    {
        return empty(env('BACKEND_PATH')) ? 'admin' : env('BACKEND_PATH');
    }
}

if (!function_exists('defaultLanguage')) {
    function defaultLanguage()
    {
        return empty(env('DEFAULT_LANGUAGE')) ? 'en' : env('DEFAULT_LANGUAGE');
    }
}


if (! function_exists('nhaude_asset')) {
    function nhaude_asset($path)
    {
        $timestamp = \Carbon\Carbon::now()->timestamp;
        
        if (strpos(url('/'), 'public') !== false) {
            $path = asset( $path, false) . '?v=';
        } else {
            $path = asset('public/'. $path, false) . '?v=';
        }
        
        $path .= config('app.debug') ? $timestamp : config('app.version');

        return $path;
    }
}
