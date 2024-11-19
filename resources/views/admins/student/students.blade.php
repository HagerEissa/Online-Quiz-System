      
       @extends('layouts.admin')
       @section('main')


        <div class="container-fluid">

            <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('success') !!}</p>
                    </div>
                @endif
                @if (\Session::has('delete'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('delete') !!}</p>
                    </div>
                @endif
                
                <h5 class="card-title mb-4 d-inline">Students</h5>
               <a href="{{route('admin.createstudent')}}" class="btn btn-primary mb-4 text-center float-right">Create Students</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">email</th>
                      <th scope="col">password</th>
                      <th scope="col">delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $student)
                    <tr>
                      <th scope="row">{{$student->id}}</th>
                      <td>{{$student->name}}</</td>
                      <td>{{$student->email}}</</td>
                      <td>{{$student->password}}</td>
                      {{-- <td><a href="#" class="btn btn-warning text-white text-center ">Update </a></td> --}}
                      <td><form action="{{ route('student.delete', $student->id) }}" method="POST" style="display:inline;">
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