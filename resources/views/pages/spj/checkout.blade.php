@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - {{ $endpoint }}</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    <a class="btn btn-primary" href="{{ route(strtolower($title).".create") }}"> Tambah Data Baru</a>
@endsection
@section('mainpage')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Data {{ $title }}</h6>
                </div>
                <div class="card-body py-0">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
