<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected static $category;

    public static function addCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;
        self::$category->save();
    }
    public static function updateCategory($request,$id)
    {
        self::$category= Category::find($id);
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;
        self::$category->save();
    }
    public static function deleteCategory($id)
    {
        self::$category =Category::find($id);
        self::$category->delete();
    }
}
