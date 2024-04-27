<x-app-layout>

    <div name="header" class=" container bg-slate-500 d-flex justify-content-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card">
                        <div class="card-header">
                            <form method="POST" action="{{ route('roles.update', $role->id) }}" class="was-validated" id="save-form">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-5" style="order-right: 1px solid black;">

                                        <div class="form-group row">
                                            <label for="EmployeLabel"
                                                class="col-sm-4 col-form-label col-form-label-sm"><strong>Employe Name :
                                                </strong></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" value="{{ $role->name }}"
                                                    id="name"
                                                    class="form-control form-control-sm form_check_color_right"
                                                    id="EmployeLabel" placeholder="Employe Name here..." required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                            @endif
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
