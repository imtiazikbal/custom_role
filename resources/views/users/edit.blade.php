<x-app-layout>

    <div name="header" class=" container bg-slate-500 d-flex justify-content-between">

        <button class="btn btn-primary">
            <a href="{{ route('users') }}">
                Back
            </a>
        </button>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card">
                        <div class="card-header">
                            <form method="POST" action="{{ route('users.update', $user->id) }}" class="was-validated"
                                id="save-form">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-5" style="order-right: 1px solid black;">

                                        <div class="form-group row">
                                            <label for="EmployeLabel"
                                                class="col-sm-4 col-form-label col-form-label-sm"><strong>User Name :
                                                </strong></label>
                                            <div class="col-sm-8">

                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    id="name"
                                                    class="form-control form-control-sm form_check_cold('name'olor_right"
                                                    id="EmployeLabel" placeholder="Employe Name here..." required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                            @endif

                                            <div class="col-sm-8">
                                                <label for="EmployeLabel"
                                                    class="col-sm-4 col-form-label col-form-label-sm"><strong>Email :
                                                    </strong></label>
                                                <input type="text" name="email" value="{{ $user->email }}"
                                                    id="name"
                                                    class="form-control form-control-sm form_check_color_right"
                                                    id="EmployeLabel" placeholder="Employe Name here..." required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                            <div class="col-sm-8">
                                                <label for="EmployeLabel"
                                                    class="col-sm-4 col-form-label col-form-label-sm"><strong>Password :
                                                    </strong></label>
                                                <input type="text" name="password" value="{{ old('password') }}"
                                                    id="name"
                                                    class="form-control form-control-sm form_check_color_right"
                                                    id="EmployeLabel" placeholder="Employe Name here...">
                                            </div>
                                            <div class="col-sm-8">
                                                <label for="EmployeLabel"
                                                    class="col-sm-4 col-form-label col-form-label-sm"><strong>Role :
                                                    </strong></label>
                                                <select name="role[]" id=""class="form-select form-select-sm"
                                                    multiple aria-label="multiple select example">
                                                    <option value="" selected disabled>Select Role</option>
                                                    @foreach ($roles as $role)
                                                        <option {{ in_array($role->name, $usersRoles) ? 'selected' : '' }}
                                                            {{ $role->name }}
                                                            value="{{ $role->id }} 
                                                    ">
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Save
                                        Employee</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
