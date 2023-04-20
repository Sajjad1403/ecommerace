@extends('layout.backend.app')

@section('page_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Api Key
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mx-auto col-10 col-md-8 col-lg-6">
                    <form action="{{ route('admin.apiKeys.update', $apiKey->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="container">

                            <div class="row">
                                <div class="form-group mb-3 mt-3">
                                    <label class="name">App Name</label>
                                    <input type="text" name="appName" value="{{ $apiKey->app_name }}"
                                        class="form-control">
                                </div>
                            </div>
                       
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label class="status">Assign To</label>
                                    <select name="assign_to" class=" form-control select2" style="width: 100% !important;">
                                        <option selected disabled>select</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $apiKey->assign_to == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mb-3">
                                    <label class="status">Select Status</label>
                                    <select name="status" class=" form-control select2" style="width: 100% !important;">
                                        <option selected disabled>choose status</option>
                                        <option value="0" {{ $apiKey->status == 0 ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ $apiKey->status == 1 ? 'selected' : '' }}>Inctive</option>
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
