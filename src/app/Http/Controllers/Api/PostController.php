<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    
    public function index()
    {
        return PostResource::collection(Post::all());         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request()->file('image');

        $exploded = explode(',', $request->image);
        $decoded = base64_decode($exploded[1]);

        if(Str::contains($exploded[0], 'jpeg'))
            $extension = 'jpg';
        else
            $extension = 'png';

        $fileName = Str::random(). '.' . $extension;
        $path = public_path() . '/' . $fileName;


        $post = Post::create([
                'user_id' => Auth::id() //auth()->user()->id
                ] + $request->except('image'));

        // if($request->file('file')){
        //     $post->image = $request->file('file')->store('posts', 'public');
        //     $post->save();
        // }

        $image_64 = $request->image; //your base64 encoded data

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 

        $image = str_replace($replace, '', $image_64); 

        $image = str_replace(' ', '+', $image); 

        $imageName = 'posts/' . Str::random(10).'.'.$extension;

        Storage::disk('public')->put($imageName, base64_decode($image));

        $post->image = $imageName;            
        
        $post->save();
        
        return $post;
    }

}
