@extends('dashboard.layout.master')

@section('page-title')
    {{ $page_title=ucwords('categories table') }}
@endsection
@csrf
@section('content')
    @csrf
    {{--Update Status--}}
    @include('dashboard.status.status')
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
                        Category name
                    </th>
                    <th style="width: 30%">
                        Category Code
                    </th>
                    <th>
                        Created at
                    </th>
                    <th style="width: 8%" class="text-center">
                        Updated at
                    </th>
                    <th style="width: 20%">
                        <a class="btn btn-outline-primary m-auto d-flex text-center float-right"
                           href="{{ route('dashboard.categories.create') }}"
                           data-toggle="tooltip" data-placement="top"
                           title="ADD Category">
                            <i class="fas fa-plus-square p-1"></i>
                            Add Category
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>
                            #{{ $counter++ }}
                        </td>
                        <td>
                            <a>
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $category->code }}
                            </a>
                        </td>
                        <td>
                            {{ $category->created_at }}
                        </td>
                        <td>
                            {{ $category->updated_at }}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" target="_blank"
                               href="{{ route('dashboard.categories.show',$category->id) }}"
                               data-toggle="tooltip" data-placement="top"
                               title="View Category {{ $counter-1 }}">
                                <i class="fas fa-external-link-alt"></i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm"
                               href="{{ route('dashboard.categories.edit',$category->id) }}"
                               data-toggle="tooltip" data-placement="top"
                               title="Edit Category {{ $counter-1 }}">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            <form class="btn btn-danger btn-sm m-0"
                                  action="{{ route('dashboard.categories.destroy', ['category' => $category->id]) }}"
                                  method="POST">
                                @method('DELETE')
                                @csrf
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <i class="fas fa-trash-alt">
                                </i>
                                <input name="delete" type="submit" class="btn btn-danger btn-sm p-0"
                                       value="Delete"
                                       data-toggle="tooltip" data-placement="top"
                                       title="Delete Category {{ $counter-1 }}">
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
                    {!! $categories->links('vendor.pagination.custom') !!}
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
@endsection
