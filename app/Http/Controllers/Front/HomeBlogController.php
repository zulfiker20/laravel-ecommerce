<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class HomeBlogController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::latest()->get();
        $blogcat = BlogCategory::latest()->get();
        return view('front.blog.index', compact('blogPosts', 'blogcat'));
    }
    public function details($slug)
    {
        $blogPosts = BlogPost::where('slug', $slug)->firstOrFail();
        $blogcat = BlogCategory::latest()->get();
        return view('front.blog.details', compact('blogPosts', 'blogcat'));
    }
    public function category($slug)
    {
        $blogcategory = BlogCategory::where('slug', $slug)->firstOrFail();
        $blogPosts = BlogPost::where('category_id', $blogcategory->id)
            ->latest()->get();

        $blogcat = BlogCategory::latest()->get();

        return view('front.blog.category_wise', compact(
            'blogPosts',
            'blogcat',
            'blogcategory'
        ));
    }
}
