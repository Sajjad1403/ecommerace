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
                                    <h2 class="text-center">Users Index</h2>
                                    <a class="btn btn-outline-primary btn-add btn-round btn-sm "
                                        style="float: right;margin-bottom: 40px;" href="{{ route('admin.users.create') }}">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table class="table table-bordered" id="userTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Assign To</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            @foreach ($user->roles as $role)
                                                <td>{{ str_replace('_', ' ', $role->name) }}</td>
                                            @endforeach

                                            <td>{{ $user->parent ? str_replace('_', ' ', $user->parent->first_name ) : '' }}</td>

                                            <td>{{ $user->status == 0 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('admin.users.destroy', $user->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
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
            $('#userTable').DataTable();
        });
    </script>
@endsection
