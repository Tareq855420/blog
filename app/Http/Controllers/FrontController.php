<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        $firstPosts2 = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPosts = $posts->splice(0);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0, 1);
        $firstfooterPosts2 = $footerPosts->splice(0, 2);
        $lastFooterPost = $footerPosts->splice(0, 1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->simplePaginate(9);
        return view('front.home.home', compact(['posts', 'recentPosts', 'firstPosts2', 'middlePost', 'lastPosts', 'firstFooterPost', 'firstfooterPosts2', 'lastFooterPost']));
    }

    public function category($id)
    {

        $allCategory = Category::with('post', 'user');
        $post = Post::with('category', 'user')->where('id', $id)->first();
        $posts = Post::with('category', 'user')->get();
        return view('front.home.category', compact(['post', 'posts', 'allCategory']));
    }

    public function post($id)
    {
        $post = Post::with('category', 'user')->where('id', $id)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();

        // More related posts
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);

        $categories = Category::all();
        $tags = Tag::all();

        if($post)
        {
            return view('front.home.post', compact(['post', 'posts', 'categories', 'tags', 'firstRelatedPost', 'firstRelatedPosts2', 'lastRelatedPost']));
        }
        else
        {
            return redirect('home');
        }
    }

    public function contact()
    {
        return view('front.home.contact', [
            'contacts' => Contact::get(),
        ]);
    }

    public function tag($id)
    {
        $tag = Tag::where('id', $id)->first();
        if($tag)
        {
            $posts = $tag->posts()->orderBy('created_at', 'desc')->simplePaginate(9);

            return view('front.home.tag', compact(['tag', 'posts']));
        }
        else
        {
            return redirect()->route('home');
        }
    }

}
