@extends('layouts.admin')
@section('main')

<div class="text-center">
    <div>
        <form method="post" action="{{ route('store.question') }}">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Question" name="question" required class="form-control">
            </div>
            {{-- <input type="hidden" name="quiz_id" value="{{ $selectedQuizId }}" required> <!-- Pass the correct quiz ID here --> --}}
            <div class="form-group">
                <input type="text" placeholder="Option A" name="option_a" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Option B" name="option_b" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Option C" name="option_c" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Option D" name="option_d" required class="form-control">
            </div>
            <div class="form-group">
                <select class="form-control" name="correct_option" required>
                    <option selected disabled value>-- Select Correct Option --</option>
                    <option value="option_a">Option A</option>
                    <option value="option_b">Option B</option>
                    <option value="option_c">Option C</option>
                    <option value="option_d">Option D</option>
                </select>
            </div>
            <div class="form-group">
                <select name="category_id" class="form-control mt-3 mb-4 form-select"  required>
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <div class="form-group">
                    <div class="form-group">
                        <select name="quiz_id" class="form-control mt-3 mb-4 form-select" required>
                            <option selected disabled>Select Quiz Level</option>
                            @foreach ($quizLevels as $level => $id)
                                <option value="{{ $id }}">{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
function correctAnswer(){
    let a = document.getElementsByName('option_a');
    alert('a');
}
</script>
@endsection
