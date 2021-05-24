<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           HI <b> {{auth()->user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>

                    @php( $i=1);
                    @foreach($user as $user)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                  </tr>

                  @endforeach
             
                </tbody>
              </table>
        </div>


    </div class="container">
    <div class="row">

      

    </div>
    <div>

    </div>
</x-app-layout>
