@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('create posts') }}
@endsection
@csrf
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($page_title) }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-group mb-0">
            <div class="card-body">
                <!-- Title input -->
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Enter post title">
                </div>
                <!-- Body input -->
                <div class="form-group">
                    <label for="inputBody">Body</label>
                    <textarea class="ckeditor form-control" id="inputBody" name="wysiwyg-editor"
                              placeholder="Enter ..."></textarea>
                </div>
                <!-- Feature image input -->
                <div class="form-group">
                    <label for="inputFeatureImage">Feature image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFeatureImage">
                            <label class="custom-file-label" for="inputFeatureImage">Choose Feature image file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <!-- Large image input -->
                <div class="form-group">
                    <label for="inputLargeImage">Large image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputLargeImage">
                            <label class="custom-file-label" for="inputLargeImage">Choose Large image file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <!-- Views number input -->
                <div class="form-group">
                    <label for="inputViewsNumber">Views number</label>
                    <input type="number" class="form-control" id="inputViewsNumber"
                           placeholder="Enter post views number">
                </div>
                <!-- Shares number input -->
                <div class="form-group">
                    <label for="inputSharesNumber">Shares number</label>
                    <input type="number" class="form-control" id="inputSharesNumber"
                           placeholder="Enter post shares number">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Post" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@endsection
