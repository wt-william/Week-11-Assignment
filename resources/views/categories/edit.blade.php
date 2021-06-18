@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="user">
                @csrf
                @method('put')
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" required class="form-control form-control-user" name="name" placeholder="Category Name" value="{{ $category->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection