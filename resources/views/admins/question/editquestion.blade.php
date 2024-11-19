@extends('layouts.admin')
@section('main')

<div class="text-center">
    <div>
        <form method="post" action="{{route('question.update',$question->id)}}"> {{-- Update this action URL to your store route --}}
            @csrf
            <div class="form-group">
                <input type="text" value="{{ $question->question }}" placeholder="Question" name="question" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" value="{{ json_decode($question->options)->option_a ?? '' }}" placeholder="Option A" name="option_a" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" value="{{ json_decode($question->options)->option_b ?? '' }}" placeholder="Option B" name="option_b" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" value="{{ json_decode($question->options)->option_c ?? '' }}" placeholder="Option C" name="option_c" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" value="{{ json_decode($question->options)->option_d ?? '' }}" placeholder="Option D" name="option_d" required class="form-control">
            </div>
            <div class="form-group">
                <select class="form-control" name="correct_option" required>
                    <option selected disabled value>-- Select Correct Option --</option>
                    <option value="option_a" {{ $question->correct_option == json_decode($question->options)->option_a ? 'selected' : '' }}>Option A</option>
                    <option value="option_b" {{ $question->correct_option == json_decode($question->options)->option_b ? 'selected' : '' }}>Option B</option>
                    <option value="option_c" {{ $question->correct_option == json_decode($question->options)->option_c ? 'selected' : '' }}>Option C</option>
                    <option value="option_d" {{ $question->correct_option == json_decode($question->options)->option_d ? 'selected' : '' }}>Option D</option>
                </select>
            </div>
            <div class="form-group">
                <select name="category_id" class="form-control mt-3 mb-4 form-select" required>
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $question->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <div class="form-group">
                        <select name="quiz_id" class="form-control mt-3 mb-4 form-select" required>
                            <option selected disabled>Select Quiz Level</option>
                            @foreach ($quizLevels as $level => $id)
                                <option value="{{ $id }}" {{ $question->quiz_id == $id ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
function correctAnswer() {
    let a = document.getElementsByName('option_a');
    alert('a');
}
</script>
@endsection
