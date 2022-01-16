@extends('layouts.app')

@section('content')

    <h2>Add a blog</h2>

    <form method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Blog Title</label>
            <div class="col-sm-9">
                <input name="title" type="text" class="form-control" id="titleid" placeholder="Blog Title" required value="{{ old('title') }}">
            </div>
        </div>     
        <div class="form-group row">
            <label for="ContentID" class="col-sm-3 col-form-label">Content</label>
            <div class="col-sm-9">
                <textarea name="body" type="text" class="form-control" id="ContentID" rows="10"
                       placeholder="content" required>{{ old('body') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="blogimageid" class="col-sm-3 col-form-label">Blog Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="blogimageid" class="custom-file-input" required value="{{ old('image') }}">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit Blog</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>

@endsection
