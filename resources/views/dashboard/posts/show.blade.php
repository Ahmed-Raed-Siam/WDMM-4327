@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('view post') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst(trans($page_title.' '.$post->id)) }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <dl class="card-body row">
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
        </div>
    </div>
@endsection
