<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Review;
use App\Models\User;

class ReviewsController extends Controller
{
    //
    public function index()
    {
        $reviews = Review::latest()->get();
        $activeusers = User::activeusers_byreviews();
         return view('reviews.index', ['reviews' => $reviews, 'activeusers' => $activeusers]);
    }
    
    public function create(BlogPost $post)
    {
        return view('reviews.create', ['post' => $post]);
    }

    
    public function store(BlogPost $blogPost)
    {

        $this->validate(request(), [
            'body' => 'required|min:3'
        ]);
        //// NOTE: here the parameter here must be $blogPost, can't be any random name
        //error_log('blogpostid----'.$blogPost->id);
        // Review::create([
        //     'body' => request('body'), //$request->body,
        //     'post_id' => $blogPost->id
        // ]);

        $blogPost->addReview(request('body'), auth()->id());

        //// the following two returns give same effects!
        //return back();
        return redirect()->to('/blog/' . request()->route()->blogPost->id);
    }

     public function show(Review $review)
    {
        return view('reviews.show', ['review' => $review]);
    }
}
