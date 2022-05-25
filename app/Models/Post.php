<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected static $post;
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function savePost($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl = self::imageUpload($request);
        }else
        {
            self::$imageUrl='';
        }

        self::$post = new Post();
        self::$post->title = $request->title;
        self::$post->image = self::$imageUrl;
        self::$post->description = $request->description;
        self::$post->category_id = $request->category_id;
        self::$post->user_id = Auth::user()->id;
        self::$post->published_at = Carbon::now();
        self::$post->status = $request->status;
        self::$post->save();
    }

    protected static function imageUpload($request)
    {
        self::$image = $request->file('image');
        self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imageDirectory = 'assets/image/';
        self::$image->move(self::$imageDirectory,self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }
    protected static function updatePost($request,$id)
    {
        self::$post = Post::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$post->image))
            {
                unlink(self::$post->image);
            }
            self::$imageUrl =self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$post->image;
        }

        self::$post->title = $request->title;
        self::$post->image = self::$imageUrl;
        self::$post->description = $request->description;
        self::$post->category_id = $request->category_id;
        self::$post->user_id = Auth::user()->id;
        self::$post->published_at = $request->published_at;
        self::$post->status = $request->status;
        self::$post->save();
    }
    protected static function deletePost(Post $post, $id)
    {
        self::$post = Post::find($id);
        if (self::$post->image)
        {
            unlink(self::$post->image);
        }
        self::$post->delete();
    }
}
