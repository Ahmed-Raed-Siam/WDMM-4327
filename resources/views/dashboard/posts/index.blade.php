@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('posts table') }}

@endsection
@csrf
@section('content')
    <div class="card p-2">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($page_title) }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-0">
            <table class="table table-hover table-responsive table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Post Title
                    </th>
                    <th style="width: 30%">
                        Feature Image
                    </th>
                    <th>
                        Post Views
                    </th>
                    <th style="width: 8%" class="text-center">
                        Post Shares
                    </th>
                    <th style="width: 20%">
                        <a class="btn btn-outline-primary m-auto d-flex text-center float-right"
                           href="{{ route('dashboard.posts.create') }}"
                           data-toggle="tooltip" data-placement="top"
                           title="ADD Post {{ $counter }}">
                            <i class="fas fa-plus-square p-1"></i>
                            Add Post
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>
                            #{{ $counter++ }}
                        </td>
                        <td>
                            <a>
                                {{ $post->title }}
                            </a>
                            <br/>
                            <small>
                                Created {{ $post->created_at }}
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset("dist/img/avatar.png") }}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset("dist/img/avatar2.png") }}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset("dist/img/avatar3.png") }}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{ asset("dist/img/avatar4.png") }}">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                     aria-valuemin="0"
                                     aria-valuemax="100" style="width: 57%">
                                </div>
                            </div>
                            <small>
                                Post Views {{ $post->views }}
{{--                                57% Complete--}}
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">{{ $post->shares }}</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm"
                               href="{{ route('dashboard.posts.show',$post->id) }}"
                               data-toggle="tooltip" data-placement="top"
                               title="View Post {{ $counter }}">
                                {{--<i class="fas fa-folder"></i>--}}
                                <i class="fas fa-external-link-alt"></i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm"
                               href="#"
                               data-toggle="tooltip" data-placement="top"
                               title="Edit Post {{ $counter }}">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            <form class="btn btn-danger btn-sm m-0"
                                  action="{{ route('dashboard.posts.destroy', ['post' => $post->id]) }}"
                                  method="POST">
                                @method('DELETE')
                                @csrf
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <i class="fas fa-trash-alt">
                                </i>
                                <input name="delete" type="submit" class="btn btn-danger btn-sm p-0"
                                       value="Delete"
                                       data-toggle="tooltip" data-placement="top"
                                       title="Delete Post">
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer w-100 m-0 pt-sm-2 pr-sm-2 pl-sm-1 bg-light">
            <div class="d-block p-2">
                <ul class="pagination m-auto d-flex justify-content-center float-right ">
                    {!! $posts->links('vendor.pagination.custom') !!}
                </ul>
            </div>
            <!-- /.card-footer -->

            {{--            <div--}}
            {{--                class="card-footer pagination dataTables_paginate page-link jsgrid-pager-nav-inactive-button pagination-centered">--}}
            {{--                {!! $posts->links('vendor.pagination.custom') !!}--}}
            {{--            </div>--}}
        </div>
@endsection
