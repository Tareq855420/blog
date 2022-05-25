<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        return view('admin.post.add',[
            'categories' => Category::where('status', 1)->get(),
            'tags' => Tag::where('status', 1)->get(),
        ]);
    }
    public function newPost(Request $request)
    {
        Post::savePost($request);
        return redirect()->back()->with('message','Post Created Successfully');
    }
    public function managePost()
    {
        return view('admin.post.manage',[
            'posts'=>Post::latest()->get(),
        ]);
    }
    public function editPost($id)
    {
        return view('admin.post.edit',[
            'post'=>Post::find($id),
            'categories'=>Category::where('status',1)->get(),
            'tags' => Tag::where('status', 1)->get(),
        ]);
    }
    public function updatePost(Request $request,$id)
    {
        Post::updatePost($request,$id);
        return redirect('/manage-post')->with('message',"Post Updated Successfully");
    }
    public function deletePost(Post $post, $id)
    {
        Post::deletePost($post, $id);
        return redirect('/manage-post')->with('message','Post Deleted Successfully');
    }

}
