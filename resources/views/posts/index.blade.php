@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>
                                <a href="{{ route('posts.create') }}" class="btn btn-primary">+ (New)</a>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->author->full_name }}</td>
                                <td>
                                    <ul>
                                        @can('updatePost', $post)
                                            <li>
                                                <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                            </li>
                                        @endcan

                                        @can('deletePost', $post)
                                            <li>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
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