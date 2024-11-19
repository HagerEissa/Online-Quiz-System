      
       @extends('layouts.admin')
       @section('main')


        <div class="container-fluid" style="margin-top: 30px;">

            <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
                @if (\Session::has('update'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('update') !!}</p>
                </div>
            @endif
                @if (\Session::has('delete'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('delete') !!}</p>
                </div>
            @endif
                <h5 class="card-title mb-4 d-inline">Quizzes</h5>
               <a href="{{route('create.quiz')}}" class="btn btn-primary mb-4 text-center float-right">Create Quizzes</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category</th>
                      <th scope="col">Level</th>
                      <th scope="col">duration</th>
                      <th scope="col">quiz score</th>
                      <th scope="col">update</th>
                      <th scope="col">delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                      <th scope="row">{{$quiz->id}}</th>
                      <td>{{$quiz->category->name}}</td>
                      <td>{{$quiz->level}}</td>
                      <td>{{$quiz->duration}}</td>
                      <td>{{$quiz->quiz_score}}</td>
                      <td><a  href="{{route('quiz.edit',$quiz->id)}}" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><form action="{{ route('quiz.delete', $quiz->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-center">Delete</button>
                    </form></td>
                    </tr>
                   @endforeach
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
        </div>
  
  
  
    </div>



   @endsection