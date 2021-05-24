<x-app-layout>
    <x-slot name="header">
       
      @if(session('success'))

      <h2 class="font-semibold alert alert-success">
        {{session('success')}}  </h2>
      @endif
      
      
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">

    <div class="container">
      <div class="row">
       
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"> All Category</div>
            <div class="card-body">
                  
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SL No</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">User</th>
                  <th scope="col">Created</th>
                  <th scope="col">Update</th>
                  <th scope="col">Delete</th>

                </tr>
              </thead>
              <tbody>

                  {{-- @php( $i=1) --}}
                  @foreach($category as $cat)
                <tr>
                  <th scope="row">{{$category->firstItem()+$loop->index}}</th>
                  <td>{{$cat->category_name}}</td>
                  <td>{{$cat->user->name}}</td>

                  @if($cat->created_at == NULL)
                  <span class="text-danger">No Date Is Set</span>
                  @else
                  <td>{{$cat->created_at->diffforHumans()}}</td>
                  @endif
                  <td><a href="{{url('category/edit/'.$cat->id)}}" class="btn btn-info">Edit</a></td> 
                  <td><a href="{{url('category/delete/'.$cat->id)}}" class="btn btn-danger">Delete</a></td> 

                </tr>

                @endforeach
           
              </tbody>
            </table>

            {{$category->links()}}
            </div>
        
    
  

          </div>
        </div>


     <div class="col-md-4">
          <div class="card">
            <div class="card-header"> Add New Category</div>

            <div class="card-body">

              <form action="{{route('store.category')}}" method="POST">
                @csrf

                <div class="mb-3 mt-1">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <input type="text" class="form-control" id="category_name"  name="category_name" aria-describedby="emailHelp">
                  @error('category_name')
                      <h1 class="alert alert-danger">{{$message}}</h1>
                  @enderror
                </div>
             
              
                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>
            </div>
        
          </div> 
        </div>
      </div>



          </div>
  


    <div class="container">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"> Restore Category</div>
          <div class="card-body">
                
          <table class="table">
            <thead>
              <tr>
                <th scope="col">SL No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Restore</th>
                <th scope="col">Permanent Delete</th>

              </tr>
            </thead>
            <tbody>

                @foreach($trash as $trash)
              <tr>
                <th scope="row">{{$category->firstItem()+$loop->index}}</th>
                <td>{{$trash->category_name}}</td>
                <td><a href="{{url('category/restore/'.$trash->id)}}" class="btn btn-info">Restore</a></td> 
                <td><a href="{{url('category/pdelete/'.$trash->id)}}" class="btn btn-danger">Delete</a></td> 

              </tr>

              @endforeach
         
            </tbody>
          </table>

          {{$category->links()}}
          </div>
      
  


        </div>
      </div>
    </div>
  </div>

    </div>


    
    
</x-app-layout>
