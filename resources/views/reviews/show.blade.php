@extends('layouts.app')

@section('content')

    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-block">
                <h3 class="card-title">{{ $review->body }}</h3>
                <p class="small">a review of <a href="/blog/{{ $review->blogPost->id }}">{{ $review->blogPost->title }}</a>
                    submitted by {{ $review->user->name }} {{$review->created_at->diffForHumans()}}</p>
                <a href="/reviews" class="btn btn-primary">List all Reviews</a>
            </div>
        </div>
    </div>

@endsection
