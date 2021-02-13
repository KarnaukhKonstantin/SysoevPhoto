<?php

namespace App\Http\Controllers\Api;

use App\PhotoSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoSessionController extends Controller
{
    public function storeSession(Request $request)
    {
        return PhotoSession::create(['name' => $request->title]);
    }

    public function getSessions()
    {
        return PhotoSession::all();
    }
}
