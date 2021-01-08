<?php

namespace App\Http\Controllers\Api;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $files = [];
        $storePhotos = [];

        foreach ($request->items as $file) {
            $name = $file->getClientOriginalName();
            $destinationPath = storage_path('app/public/photos/');
            $file->move($destinationPath, $name);
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

    public function getPhotos()
    {
        $photos = Gallery::all();
        return response()->json($photos);
    }
}
