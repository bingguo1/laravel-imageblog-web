@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary">Go back</a>
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a> 
                <form id="delete-frm" class="" action="" method="POST" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p class="small">Blog submitted by user {{ $post->user->name }}</p>
                <!-- the following two ways to show images are all correct -->
                <!-- the /storage/ here actually mean /public/storage, "public" should be  omitted here, and this directory is actually a link to /storage  which doesn't give access to external body -->
                <img class="card-img-top" src="{{ '/storage/'.$post->image }}" alt="Card image cap"> 
                <!-- <img class="card-img-top" src="{{ Storage::url($post->image) }}" alt="Card image cap"> -->
                <p>{!! $post->body !!}</p> 
                <hr>
                <div class="reviews">
                    <h4>What People Are Saying</h4>
                    <ul class="list-group">
                        @foreach($post->reviews as $review)
                            <li class="list-group-item">{{ $review->body }}
                                <hr>
                                <a href="/reviews/{{$review->id}}"><small class="text-primary">posted {{$review->created_at->diffForHumans()}} by
                        user {{ $review->user->name }}</small></a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="addreview">
                    <div class="card-block">
                        <form method="POST" action="/blog/{{ $post->id }}/reviews">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body" class="form-control" placeholder="Add a review!"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add a review!</button>
                            </div>
                            @include('partials.formerrors')
                        </form>
                    </div>
                </div>               
            </div>
        </div>
        <div class="col-4">
            @include('partials.activeusers')
        </div>        
    </div>
@endsection
