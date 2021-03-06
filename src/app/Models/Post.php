<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Category;

class Post extends Model
{
    //
    use Sluggable;
    
    protected $fillable = [
        'title', 'body', 'iframe','image', 'user_id', 'category_id', 'status_id'
    ];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function getGetExcerptAttribute(){

        return substr($this->body, 0, 140);
    }

    public function getGetImageAttribute(){

        if($this->image)

        return url("storage/$this->image");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(PostStatu::class);
    }
}
