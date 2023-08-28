<?php

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

use function PHPUnit\Framework\assertTrue;

if (!function_exists('successResponseData')) {
    function successResponseData($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
            'data'       => $data,
        ], $status);
    }
}

if (!function_exists('successResponseMessage')) {
    function successResponseMessage($message = 'Success', $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
        ], $status);
    }
}

if (!function_exists('errorResponseMessage')) {
    function errorResponseMessage($error, $status = 400)
    {
        return response()->json([
            'statusType' => false,
            'status'     => $status,
            'error'      => $error,
        ], $status);
    }
}

if (! function_exists('getIamgesMediaUrl')) {
    function getIamgesMediaUrl($images, $conversions = '')
    {
        $gallery = [];
        foreach ($images as $image) {
            $gallery[] = [
                'id'  => $image->id,
                'url' => $image->getUrl($conversions),
            ];
        }

        return $gallery;
    }
}


// if (! function_exists('uploadImage ')) {
//     function uploadImage($request, $path)
//     {
//         $image_name = date('Y-m-d') . '_' . uniqid() . '.' . $request->image->extension();
//         Image::make($request->image)->save($path . $image_name);

//         return $image_name;
//     }
// }

// if (! function_exists('deletImage ')) {
//     function deletImage($path)
//     {
//         if (File::exists($path)) {
//             File::delete($path);
//         }
//     }
// }
