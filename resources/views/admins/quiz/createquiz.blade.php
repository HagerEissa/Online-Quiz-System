@extends('layouts.admin')
@section('main')

<div class="text-center">
    <div>
        <form method="post" action="{{ route('store.quiz') }}">
            @csrf
            
            <div class="form-group" style="width: 50%;height:60px;position:relative;left:10px;">
                <input type="text" placeholder="Title" name="title" required class="form-control">
            </div>
            {{-- <input type="hidden" name="quiz_id" value="{{ $selectedQuizId }}" required> <!-- Pass the correct quiz ID here --> --}}
            <div class="form-group"style="width: 50%;height:60px;position:relative;left:10px;">
                <input type="text" placeholder="Level" name="level" required class="form-control">
            </div>
            <div class="form-group"style="width: 50%;height:60px;position:relative;left:10px;">
                <input type="text" placeholder="Duration" name="duration" required class="form-control">
            </div>
            <div class="form-group"style="width: 50%;height:60px;position:relative;left:10px;">
                <input type="text" placeholder="Quiz_score" name="quiz_score" required class="form-control">
            </div>
            <div class="form-group"style="width: 50%;height:60px;position:relative;left:10px;">
            <select name="category_id" class="form-control mt-3 mb-4 form-select"  required>
                <option selected disabled>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit" style="position: relative;left:-20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
