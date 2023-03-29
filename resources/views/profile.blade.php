@extends('layout.backend.app')

@section('page_css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-item-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"> <a href="javascript:void(0);">My</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border">
                    <div class="card-body">
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                            @include('profile.update-profile-information-form')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
@endsection
