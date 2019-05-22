<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        $search = request()->query('search');
        if ($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        } else {
            $posts = $category->posts()->simplePaginate(3);
        }

        return view('blog.category')->withcategory($category)->withposts($posts)->with('categories', Category::all())->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        $search = request()->query('search');
        if ($search) {
            $posts = $tag->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        } else {
            $posts = $tag->posts()->simplePaginate(3);

            return view('blog.tag')->withtag($tag)->withposts($tag->posts()->simplePaginate(3))->with('categories', Category::all())->with('tags', Tag::all());
        }
    }
}