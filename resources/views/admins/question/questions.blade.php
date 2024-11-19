         
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
                <h5 class="card-title mb-4 d-inline">Questions</h5>
                <a href="{{route('admin.createquestion')}}" class="btn btn-primary mb-4 text-center float-right" >Create Questions</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category</th>
                      <th scope="col">Level</th>
                      <th scope="col">question</th>
                      <th colspan="4" scope="colgroup">Options</th>
                      <th scope="col">correct answer</th>
                      <th scope="col">update</th>
                      <th scope="col">delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($questions as $question)
                    <tr>
                      <th scope="row">{{$question->id}}</th>
                      <td>{{$question->category->name}}</td>
                      <td>{{$question->quiz->level}}</td>
                      <td>{{$question->question}}</td>
                            @php
                              $options = json_decode($question->options, true);
                           @endphp
                
                {{-- Display the options --}}
                @foreach($options as $option)
                    <td>{{ $option }}</td>
                @endforeach
                      <td>{{$question->correct_option}}</td>
                      <td><a  href="{{route('question.edit',$question->id)}}" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><form action="{{ route('question.delete', $question->id) }}" method="POST" style="display:inline;">
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
          {{ $questions->links() }}
      </div>
    </div>

    
    
   



    @endsection