@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('create categories') }}
@endsection
@csrf
@section('content')
    @csrf
    {{--Update Status--}}
    @include('dashboard.status.status')
    {{--simple error tracing--}}
    @include('dashboard.simple error tracing.simple_error_tracing')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($page_title) }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('dashboard.categories.store') }}" class="form-group mb-0"
              enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- _token input -->
                <div class="form-group">
                    {{ csrf_field() }}
                </div>
                <!-- Username input -->
                <div class="form-group">
                    <label for="inputCategoryName">Category name</label>
                    <input name="category_name" type="text" class="form-control" id="inputCategoryName"
                           placeholder="Enter category name">
                </div>
                <!-- Email input -->
                <div class="form-group">
                    <label for="InputCategoryCode">Category code</label>
                    <input name="category_code" type="text" class="form-control" id="InputCategoryCode"
                           placeholder="Enter category code"
                           maxlength="3">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Category" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@endsection
