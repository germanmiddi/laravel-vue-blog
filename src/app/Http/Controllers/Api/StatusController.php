<?php

namespace App\Http\Controllers\Api;

use App\Models\PostStatu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Http\Resources\PostStatusResource;

class StatusController extends Controller
{

    public function index()
    {
        return PostStatusResource::collection(PostStatu::all());
    }

}
