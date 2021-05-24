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
                </tr>
              </thead>
              <tbody>

                  @php( $i=1)
                  @foreach($category as $cat)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$cat->category_name}}</td>
                </tr>

                @endforeach
           
              </tbody>
            </table>
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
        </div>
    </div>
    
</x-app-layout>
