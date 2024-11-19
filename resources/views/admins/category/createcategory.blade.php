@extends('layouts.admin')
@section('main')

<div class="text-center">
    <div>
        <form method="post" action="{{ route('category.store')}}">
            @csrf
            <div class="form-group" style="width: 50%;height:60px;position:relative;top:40px;left:30px;">
                <input type="text"   placeholder="Name" name="name" required class="form-control">
            </div>
            <div class="form-group" style="width: 50%;height:60px;position:relative;top:40px;left:30px;margin-top:-20px">
                <input type="text"   placeholder="Description" name="description" required class="form-control">
            </div>
            <div class="text-center" style="position:relative;top:40px;left:-100px">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection