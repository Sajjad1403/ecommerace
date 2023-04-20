@extends('layout.backend.app')

@section('page_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header">
                            <div class="text-center">
                                <div style="position: relative">
                                    <h2 class="text-center">Role Index</h2>
                                    <a class="btn btn-outline-primary btn-add btn-round btn-sm "
                                        style="float: right;margin-bottom: 40px;" href="{{ route('admin.roles.create') }}">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table class="table table-bordered" id="roleTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Permission</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->getPermissionNames() as $permissionName)
                                                    <span class="badge bg-secondary">{{ $permissionName }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#roleTable').DataTable();
        });
    </script>
@endsection
