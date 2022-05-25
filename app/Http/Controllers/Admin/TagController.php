<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function addTag()
    {
        return view('admin.tag.add');
    }
    public function newTag(Request $request)
    {
        Tag::addTag($request);
        return redirect()->back()->with('message', 'Tag Added Successfully.');
    }
    public function manageTag()
    {
        return view('admin.tag.manage',[
            'tags'=>Tag::latest()->get()
        ]);
    }
    public function editTag($id)
    {
        return view('admin.tag.edit',[
            'tag'=>Tag::find($id)
        ]);
    }
    public function updateTag(Request $request,$id)
    {
        Tag::updateTag($request,$id);
        return redirect('/manage-tag')->with('message','Category Updated Successfully');
    }
    public function deleteTag($id)
    {
        Tag::deleteTag($id);
        return redirect('/manage-tag')->with('message','Tag Deleted Successfully');
    }
}
