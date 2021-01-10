<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Http\Resources\CategoryResource;
class CategoryController extends Controller
{
    public function index()
    {
        //return Category::all('id', 'title');
        return CategoryResource::collection(Category::all());
    }
}