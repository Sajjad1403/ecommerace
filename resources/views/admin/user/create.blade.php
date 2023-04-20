@extends('layout.backend.app')

@section('page_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mx-auto col-10 col-md-8 col-lg-6">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="phone">Phone</label>
                                    <input type="tel" name="phone" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="phone">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label class="status">Assign To</label>
                                    <select name="assign_to" class=" form-control select2" style="width: 100% !important;">
                                        <option selected disabled>select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{str_replace('_',' ',$role->name)}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mb-3">
                                    <label class="status">Select Status</label>
                                    <select name="status" class=" form-control select2" style="width: 100% !important;">
                                        <option selected disabled>choose status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inctive</option>
                                    </select>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
