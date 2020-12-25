@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('edit posts') }}
@endsection
@section('content')
    @csrf
    {{--Update Status--}}
    @include('dashboard.status.status')
    {{--simple error tracing--}}
    @include('dashboard.simple error tracing.simple_error_tracing')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst(trans(substr($page_title,0,-1).' '.$post->id)) }}
                <small>Created at{{ date_format($post->created_at, 'jS M Y') }} / Updated
                    at{{ date_format($post->updated_at, 'jS M Y') }}</small>
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('dashboard.posts.update',$post->id) }}" class="form-group mb-0"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <!-- _token input -->
                <div class="form-group">
                    {{ csrf_field() }}
                </div>
                <!-- Title input -->
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                           id="inputTitle" placeholder="Enter post title" value="{{ $post->title }}">
                    @error('title')
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Body input -->
                <div class="form-group">
                    <label for="inputBody">Body</label>
                    <textarea class="ckeditor form-control @error('body') is-invalid @enderror" id="inputBody"
                              name="body"
                              placeholder="Enter ...">{{ $post->body }}</textarea>
                    @error('body')
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{--                <!-- Feature image input -->
                                <div class="form-group">
                                    <label for="inputFeatureImage">Feature image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="feature_image" type="file"
                                                   class="custom-file-input @error('feature_image') is-invalid @enderror"
                                                   id="inputFeatureImage" value="{{ old('feature_image') }}">
                                            <label class="custom-file-label" for="inputFeatureImage">Choose Feature image file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('feature_image')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Large image input -->
                                <div class="form-group form-control-file">
                                    <label for="inputLargeImage">Large image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="large_image" type="file"
                                                   class="custom-file-input @error('large_image') is-invalid @enderror"
                                                   id="inputLargeImage" value="{{ old('large_image') }}">
                                            <label class="custom-file-label" for="inputLargeImage">Choose Large image file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('large_image')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>--}}
                <div class="form-group">
                    <label for="inputStatus">Category</label>
                    <select name="category" id="inputStatus"
                            class="form-control custom-select @error('category') is-invalid @enderror">
                        <option selected="selected" disabled>Select one</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if( $post->category_id  === $category->id) selected="selected" @endif >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('dashboard.posts.index') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Save Changes" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@endsection

