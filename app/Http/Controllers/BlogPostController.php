<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function __construct()
    {
        //        $this->middleware('auth'); // this will stop all the methods
        $this->middleware('auth')->except(['index', 'show']);
    }
    //
      public function index()
    {
        // show all blog posts
        //$posts = BlogPost::all(); //fetch all blog posts from DB
        $posts = BlogPost::latest()->get();
        
        // $activeusers = User::selectRaw('users.name, count(*) submitted_posts')
        //     ->join('blog_posts', 'blog_posts.user_id', '=', 'users.id')
        //     ->groupBy('users.name')
        //     ->orderBy('submitted_posts', 'DESC')
        //     ->get();
        $activeusers = User::activeusers();

        error_log('user '.auth()->user());
        error_log('id '.auth()->id());
        
        return view('blog.index', [
            'posts' => $posts,
            'activeusers' => $activeusers
        ]); //returns the view with posts


        
    }

    public function create()
    {
        return view('blog.create');
    }

   
    public function store(Request $request)
    {
        //store a new post
        // $newPost = BlogPost::create([
        //     'title' => $request->title, // request('title') works too!
        //     'body' => $request->body,  
        //     'user_id' => 1,
        // ]);
        $this->validate(request(), [
            'title' => 'required|unique:blog_posts',
            'body' => 'required',
            'image' => 'required',
        ]);
        
        $newPost=new BlogPost;
        $newPost->title = request('title');
        $newPost->body = request('body');
        $newPost->image = request()->file('image')->store('imgs');
        $newPost->user_id= auth()->id();
        $newPost->save();
        
        session()->flash('message', 'Nice Blog posting!');
        session()->flash('type', 'success');
        
        error_log('a test from bing');
        error_log($newPost->image);
        error_log(Storage::url($newPost->image));
        // There are two things happening at once here. Laravel is accepting the file from our form submission, and storing it in the application at storage/app/public/images. At the same time, the path for the image is stored in $game->image 
        return redirect('blog/' . $newPost->id);
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog.show', [
            'post' => $blogPost,
        ]); //returns the view with the post
    }

    
    public function edit(BlogPost $blogPost)
    {
        //show form to edit the post
        return view('blog.edit', [
            'post' => $blogPost,
        ]); //returns the edit view with the post
    }

    
    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited post
         $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    
    public function destroy(BlogPost $blogPost)
    {
        //delete a post
        $blogPost->delete();

        return redirect('/blog');
    }
    
}
