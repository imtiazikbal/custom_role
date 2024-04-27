<x-app-layout>

    <div name="header" class=" container bg-slate-500 d-flex justify-content-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Role: {{ $role->name }}
        </h2>
        <button class="btn btn-primary">
            <a href="{{ route('permissions') }}">
                Back
            </a>
        </button>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-900">
                    <div class="card">
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="card-header">
                            <form method="POST" action="{{ route('roles.update-permission', $role->id) }}" class="was-validated" id="save-form">
                                @csrf
                               
                                <div class="form-row">
                                    <div class="col-sm-5" style="order-right: 1px solid black;">

                                        <div class="form-group row d-flex ">
                                            <label for="EmployeLabel"
                                                class="col-sm-4 col-form-label col-form-label-sm"><strong>Permission :
                                                </strong></label>
                                                @foreach ($permissions as $permission) 
                                                <div class="col-sm-8">
                                                    <label for="" class="form-check-label">
                                                        <input type="checkbox" 
                                                        name="permission[]"
                                                         {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} 

                                                        value="{{ $permission->id }}">

                                                            
                                                            {{ $permission->name }}
                                                        </label>
                                                    
                                                </div>
                                                @endforeach
                                           
                                            
                                        </div>



                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Update
                                        Role</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
