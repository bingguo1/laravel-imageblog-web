@extends('layouts.app')
@section('content')
     <div class="row">
        <div class="col-8">
            @foreach($posts as $post)
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-block">
                            <h3 class="card-title"><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h3>
                            <p class="small">Blog submitted by user {{ $post->user->name }}</p>
                            <a href="/blog/{{ $post->id }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">
            @include('partials.activeusers')
        </div>
     </div>
@endsection
