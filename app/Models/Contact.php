<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected static $contact;
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    protected static function saveContact($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl = self::imageUpload($request);
        }else
        {
            self::$imageUrl='';
        }

        self::$contact = new Contact();
        self::$contact->image = self::$imageUrl;
        self::$contact->address = $request->address;
        self::$contact->email = $request->email;
        self::$contact->number = $request->number;
        self::$contact->status = $request->status;
        self::$contact->save();
    }

    protected static function imageUpload($request)
    {
        self::$image = $request->file('image');
        self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imageDirectory = 'assets/image/';
        self::$image->move(self::$imageDirectory,self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }
    protected static function updateContact($request,$id)
    {
        self::$contact = Contact::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$contact->image))
            {
                unlink(self::$contact->image);
            }
            self::$imageUrl =self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$contact->image;
        }

        self::$contact->image = self::$imageUrl;
        self::$contact->address = $request->address;
        self::$contact->email = $request->email;
        self::$contact->number = $request->number;
        self::$contact->status = $request->status;
        self::$contact->save();
    }
    protected static function deleteContact($id)
    {
        self::$contact = Contact::find($id);
        if (self::$contact->image)
        {
            unlink(self::$contact->image);
        }
        self::$contact->delete();
    }
}
