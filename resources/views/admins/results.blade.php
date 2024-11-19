@extends('layouts.admin')
@section('main')

        <div class="container-fluid" style="margin-top: 40px;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if (\Session::has('delete'))
                            <div class="alert alert-success">
                                <p>{!! \Session::get('delete') !!}</p>
                            </div>
                        @endif
                            <h5 class="card-title mb-4 d-inline" style="position: relative;top:-10px">Rank with Score</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Of User</th>
                                        <th scope="col">Quiz Level</th>
                                        <th scope="col">Quiz Score</th>
                                        <th scope="col">Achieved Score</th>
                                        <th scope="col">Time Spent</th>
                                        <th scope="col">Correct Answers</th>
                                        <th scope="col">InCorrect Answers</th>
                                        {{-- <th scope="col">update</th> --}}
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $result)
                                    <tr>
                                        
                                        <th scope="row">{{$result->id}}</th>
                                        <td>{{$result->user->name}}</td>
                                        <td>{{$result->quiz->level}}</td>
                                        <td>{{$result->quiz_score}}</td>
                                        <td>{{$result->achieved_score}}</td>
                                        <td>{{$result->time_spent}}</td>
                                        <td>{{$result->correct_answers}}</td>
                                        <td>{{$result->incorrect_answers}}</td>
                                        {{-- <td><a  href="#" class="btn btn-warning text-white text-center ">Update </a></td> --}}
                                        <td><form action="{{ route('rankandscore.delete', $result->id) }}" method="POST" style="display:inline;">
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
  
  
        <div>
            {{ $results->links() }}
        </div>

    </div>

    @endsection