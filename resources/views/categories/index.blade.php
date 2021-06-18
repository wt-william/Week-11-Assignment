@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>
                                @can('store-categories')
                                    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ (New)</a>
                                @endcan
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <ul>
                                        @can('update-categories')
                                            <li>
                                                <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                            </li>
                                        @endcan

                                        @can('delete-categories')
                                            <li>
                                                <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </li>
                                        @endcan
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection