@extends('layout.backend.app')

@section('page_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mx-auto col-10 col-md-8 col-lg-6">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="last_name">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="email">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="phone">Phone</label>
                                    <input type="tel" name="phone" value="{{ $user->phone }}"  class="form-control">
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
