<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected static $tag;

    public static function addTag($request)
    {
        self::$tag = new Tag();
        self::$tag->name = $request->name;
        self::$tag->description = $request->description;
        self::$tag->status = $request->status;
        self::$tag->save();
    }
    public static function updateTag($request,$id)
    {
        self::$tag = Tag::find($id);
        self::$tag->name = $request->name;
        self::$tag->description = $request->description;
        self::$tag->status = $request->status;
        self::$tag->save();
    }
    public static function deleteTag($id)
    {
        self::$tag = Tag::find($id);
        self::$tag->delete();
    }
}
