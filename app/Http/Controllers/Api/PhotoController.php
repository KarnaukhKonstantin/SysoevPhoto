<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Gallery;
use App\PhotoSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Exception\NotReadableException;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $inputs = $request->all();
        $categoryId = $inputs['categoryId'] ?? Category::IS_OTHER;
        $items = $inputs['items'];
        $sessionId = $inputs['sessionId'] ?? null;

        $files = [];
        $storePhotos = [];

        foreach ($items as $file) {

            $name = time() .'_'. $file->getClientOriginalName();
            $name = str_replace([' ', '-', ','], '_', $name);
            $destinationPath = storage_path('app/public/photos/');

            $file = Image::make($file->getRealPath())->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $file->save($destinationPath.$name, 90);
            $files[] = $destinationPath . $name;
            $storePhotos[] = [
                'name'             => $name,
                'link'             => 'storage/photos/' . $name,
                'category_id'      => $categoryId,
                'photo_session_id' => $sessionId
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

        $photos = Gallery::where('category_id', 1)
            ->whereNull('photo_session_id')
            ->where('is_main_photo', false)
            ->take($perPage)
            ->offset($offset)
            ->get();

        $categoryPhotos = Gallery::where('category_id', 1)
            ->whereNotNull('photo_session_id')
            ->where('is_main_photo', true)
            ->orderBy('id', 'desc')
            ->take($perPage)
            ->offset($offset)
            ->with('session')
            ->get();

        return response()->json(compact('photos', 'categoryPhotos', 'count'));
    }

    public function getOtherPhotos(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $offset = $request->offset ?? 0;

        $count = Gallery::count();
        $photos = Gallery::whereNull('category_id')
            ->orderBy('id', 'desc')
            ->take($perPage)
            ->offset($offset)
            ->get();

        return response()->json(compact('photos', 'count'));
    }

    public function loadSession($photoSessionId)
    {
        $photos = Gallery::where('photo_session_id', $photoSessionId)->get();
        return response()->json($photos);
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

    public function getWeddingPhotos(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $offset = $request->offset ?? 0;

        $count = Gallery::count();
        $categoryPhotos = Gallery::where('category_id', 1)
            ->where('is_main_photo', true)
            ->orderBy('id', 'desc')
            ->take($perPage)
            ->offset($offset)
            ->get();

        $weddingSinglePhotos = Gallery::where('category_id', 1)
            ->whereNull('photo_session_id')
            ->where('is_main_photo', false)
            ->take($perPage)
            ->offset($offset)
            ->get();

        return response()->json(compact( 'categoryPhotos', 'weddingSinglePhotos', 'count'));
    }

    public function getWeddingSessionsList(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $offset = $request->offset ?? 0;

        $photoSessions = PhotoSession::orderBy('id', 'desc')
            ->take($perPage)
            ->offset($offset)
            ->with('photos')
            ->get();

        return response()->json(compact('photoSessions'));
    }

    public function getPhotoSession($id)
    {
        $photos = Gallery::where('photo_session_id', $id)->get();
        return response()->json($photos);
    }

    public function setMainPhoto($photoSessionId, $id)
    {
        $mainPhoto = Gallery::where('photo_session_id', $photoSessionId)->where('is_main_photo', 1)->first();
        $targetPhoto = Gallery::where('photo_session_id', $photoSessionId)->where('id', $id)->first();

        if (!empty($mainPhoto)) {
            $mainPhoto->is_main_photo = 0;
            $mainPhoto->save();
        }

        $targetPhoto->is_main_photo = 1;
        $targetPhoto->save();

        return response()->json($targetPhoto);
    }
}
