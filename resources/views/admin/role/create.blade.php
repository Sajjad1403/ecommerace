@extends('layout.backend.app')

@section('page_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Role
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mx-auto col-10 col-md-8 col-lg-6">
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="name">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label class="permission">Choose Permission</label>
                                    <select name="permissions[]" class=" form-control select2" multiple>
                                        <option disabled value="">--Please choose an option--</option>
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
