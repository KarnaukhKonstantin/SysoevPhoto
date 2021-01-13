<?php

namespace App\Http\Controllers\Api;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Exception\NotReadableException;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $files = [];
        $storePhotos = [];

        foreach ($request->items as $file) {
            $name = time() .'_'. $file->getClientOriginalName();
            $destinationPath = storage_path('app/public/photos/');
dd(file_get_contents($_FILES[$file]['tmp_name']));
            dd($file->getClientOriginalName());
            $file = Image::make($file);
            $file = Image::make($file->getRealPath())->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp', 90);

            $file->save($destinationPath, $name);
            $files[] = $destinationPath . $name;
            $storePhotos[] = [
                'name' => $name,
                'link' => 'storage/photos/' . $name
            ];
        }
        $this->store($storePhotos);

        return 'success';
    }

    public function store($inputs)
    {
        Gallery::insert($inputs);
    }

    public function getPhotos(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $offset = $request->offset ?? 0;
        $count = Gallery::count();
        $photos = Gallery::orderBy('id', 'desc')->take($perPage)->offset($offset)->get();

        return response()->json(compact('photos', 'count'));
    }

    public function delete(Request $request)
    {
        $removeData = $request->all();
        $removeIds = [];
        $removeLinks = [];

        if (!empty($removeData)) {
            foreach ($removeData as $photo) {
                $removeIds[] = $photo['id'];
                $removeLinks[] = $photo['link'];
            }

            Gallery::whereIn('id', $removeIds)->delete();

            foreach ($removeLinks as $link) {
                if (is_file($link)) {
                    unlink($link);
                }
            }
        }

        return response()->json('Photos were deleted successfully!');
    }
}
