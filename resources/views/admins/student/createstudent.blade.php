      
       @extends('layouts.admin')
       @section('main')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="container-fluid">
            <div class="row">
             <div class="col">
               <div class="card">
                 <div class="card-body">
                   <h5 class="card-title mb-5 d-inline">Create Students</h5>
                   <form method="POST" action="{{route('admin.storestudent')}}" enctype="multipart/form-data">
                    @csrf
                     <!-- Email input -->
                     <div class="form-outline mb-4 mt-4">
                      <label for="exampleFormControlTextarea1">Name</label>
                       <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                     </div>
                     <div class="form-outline mb-4 mt-4">
                      <label for="exampleFormControlTextarea1">Email</label>
                       <input type="text" name="email" id="form2Example1" class="form-control" placeholder="email" />      
                     </div>
                     <div class="form-group">
                       <label for="exampleFormControlTextarea1">Password</label>
                       <input type="text" type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />                     
                       </div>
                     
     
           
                     <!-- Submit button -->
                     <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
     
               
                   </form>
     
                 </div>
               </div>
             </div>
           </div>
       </div>
@endsection
