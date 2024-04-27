<x-app-layout>

    <div  name="header" class=" container bg-slate-500 d-flex justify-content-between">
       
        @include('nav-links')
        
       <button class="btn btn-primary">
        <a href="{{ route('users.create') }}">
            create User
        </a>
       </button>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-900">
                    <div class="card">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            
                       
                            
                        @endif
                        <div class="card-header">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 @foreach ($users as $user) 
                                 <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                   
                                    <td>
                                       
                                            @foreach ($user->roles as $role)
                                                @foreach ($role->permissions as $permission)
                                                {{$permission->name }}
                                                @endforeach
                                            @endforeach
                                       
                                    </td>
                                   <td>
                                    <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                       
                                    <a href="{{ route('users.edit', $user->id) }}" type="button"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a  href="{{ route('users.delete', $user->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </div>   </td>
                                                                   </tr>
                                 @endforeach
                                 
                                  
                                </tbody>
                              </table>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>