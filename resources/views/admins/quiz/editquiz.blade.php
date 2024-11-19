@extends('layouts.admin')
@section('main')

<div class="text-center">
    <div>
        {{-- {{ route('update.quiz') }} --}}
        <form method="post" action="{{route('quiz.update',$quiz->id)}}">
            @csrf
            <div class="form-group">
                <input type="text" value="{{ $quiz->title }}" placeholder="Title" name="title" required class="form-control">
            </div>
            {{-- <input type="hidden" name="quiz_id" value="{{ $selectedQuizId }}" required> <!-- Pass the correct quiz ID here --> --}}
            <div class="form-group">
                <input type="text" value="{{ $quiz->level }}" placeholder="Level" name="level" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $quiz->duration }}" placeholder="Duration" name="duration" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $quiz->quiz_score }}" placeholder="Quiz Score" name="quiz_score" required class="form-control">
            </div>
            <div class="form-group">
                <select name="category_id" class="form-control mt-3 mb-4 form-select" required>
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $quiz->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
