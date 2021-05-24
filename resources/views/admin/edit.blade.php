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
       
   
     <div class="col-md-4">
          <div class="card">
            <div class="card-header"> Edit Category</div>

            <div class="card-body">

              <form action="{{url('category/update/'.$category->id)}}" method="POST">
                @csrf

                <div class="mb-3 mt-1">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <input type="text" class="form-control" value="{{$category->category_name}}" id="category_name"  name="category_name" aria-describedby="emailHelp">
                  @error('category_name')
                      <h1 class="alert alert-danger">{{$message}}</h1>
                  @enderror
                </div>
             
                <button type="submit" class="btn btn-primary">Update Category</button>
              </form>
            </div>
        
          </div> 
        </div>
      </div>


          </div>
        </div>
    </div>
    
</x-app-layout>
