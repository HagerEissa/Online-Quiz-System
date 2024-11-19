@extends('layouts.admin')
@section('main')

<div class="text-center">
    <div>
        <form method="post" action="{{ route('category.update', $category->id) }}">
            @csrf
            <div class="form-group" style="width: 50%;height:60px;position:relative;top:40px;left:30px;">
                <input type="text"  value="{{ $category->name }}" placeholder="Name" name="name" required class="form-control">
            </div>
            <div class="form-group" style="width: 50%;height:60px;position:relative;top:40px;left:30px;margin-top:-20px">
                <input type="text"  value="{{ $category->description }}" placeholder="Description" name="description" required class="form-control">
            </div>
            <div class="text-center" style="position:relative;top:40px;left:-100px">
                <button class="btn btn-primary" type="submit">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection