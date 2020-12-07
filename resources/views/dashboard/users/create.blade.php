@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('create users') }}
@endsection
@csrf
@section('content')
    {{--Update Status--}}
    @if( session('status') )
        <div class="alert {{ session('status')['alert_status'] }} alert-dismissible fade show" role="alert">
            <strong>{{ session('status')['msg'] }}</strong>
            <p>
                {!! session('status')['pref'] !!}
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{--Simple Error Tracing--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($page_title) }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('dashboard.users.store') }}" class="form-group mb-0"
              enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- _token input -->
                <div class="form-group">
                    {{ csrf_field() }}
                </div>
                <!-- Username input -->
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input name="username" type="text" class="form-control" id="inputUsername"
                           placeholder="Enter username">
                </div>
                <!-- Email input -->
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input name="email" type="email" class="form-control" id="InputEmail" placeholder="Enter email">
                </div>
                <!-- Password input -->
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="InputPassword"
                           placeholder="Password">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new User" class="btn btn-success float-right">
            </div>
        </form>
    </div>
@endsection
