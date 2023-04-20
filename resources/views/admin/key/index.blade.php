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
                                    <h2 class="text-center">Api Key Index</h2>
                                    <a class="btn btn-outline-primary btn-add btn-round btn-sm "
                                        style="float: right;margin-bottom: 40px;"
                                        href="{{ route('admin.apiKeys.create') }}">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table class="table table-bordered" id="apiKeyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr</th>
                                        <th scope="col">Key Name</th>
                                        <th scope="col">App Name</th>
                                        <th scope="col">Assign To</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($apiKeys as $apikey)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $apikey->key }}</td>
                                            <td>{{ $apikey->app_name }}</td>
                                            <td>{{ $apikey->user->name }}</td>
                                            <td>{{ $apikey->user->name }}</td>
                                            <td>{{ $apikey->status == 0 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('admin.apiKeys.destroy', $apikey->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('admin.apiKeys.edit', $apikey->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger">Revoke</button>
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

    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#apiKeyTable').DataTable();
        });
    </script>
@endsection
