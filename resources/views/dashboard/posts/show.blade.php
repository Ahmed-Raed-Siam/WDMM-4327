@extends('dashboard.layout.master')

@section('page-title')
    View dashboard
@endsection

@section('content')

    <dl class="row">
        <dt class="col-sm-3">Post ID</dt>
        <dd class="col-sm-9">{{ $post->id }}</dd>

        <dt class="col-sm-3">Title</dt>
        <dd class="col-sm-9">{{ $post->title }}</dd>

        <dt class="col-sm-3">Body</dt>
        <dd class="col-sm-9">{{ $post->body }}</dd>

        <dt class="col-sm-3">Feature Image</dt>
        <dd class="col-sm-9">{{ $post->feature_image }}</dd>

        <dt class="col-sm-3">large_image</dt>
        <dd class="col-sm-9">{{ $post->large_image }}</dd>

        <dt class="col-sm-3">Views</dt>
        <dd class="col-sm-9">{{ $post->views }}</dd>

        <dt class="col-sm-3">Shares</dt>
        <dd class="col-sm-9">{{ $post->shares }}</dd>

        <dt class="col-sm-3">Category ID</dt>
        <dd class="col-sm-9">{{ $post->category_id }}</dd>

        <dt class="col-sm-3">User ID</dt>
        <dd class="col-sm-9">{{ $post->user_id }}</dd>

        <dt class="col-sm-3">Created</dt>
        <dd class="col-sm-9">{{ date('F d, Y', strtotime($post->created_at)) }}</dd>

        <dt class="col-sm-3">Updated</dt>
        <dd class="col-sm-9">{{ date('F d, Y', strtotime($post->updated_at)) }}</dd>
    </dl>
@endsection
