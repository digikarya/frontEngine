@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - {{ $title }}</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    <a class="btn btn-primary" href="{{ route(strtolower($endpoint).".create") }}"> Tambah Data Baru</a>
@endsection
@section('mainpage')
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="min-height: 700px;">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Data SPJ</h6>
                </div>
                <div class="card-body py-0">
                    <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('spj.show.detail',1) }}"  rel="noopener noreferrer">
                                    <div class="card bg-light mb-3" >
                                        <div class="card-body">
                                            <div class="row">
                                                    <div class="col-lg-6 text-left">
                                                        01 Februari 2020  |  07:00 - 14:00
                                                        <br/>
                                                        Tasikmalaya (TSM) - Bekasi (BKS)
                                                    </div>
                                                    <div class="col-lg-6 text-left text-sm-left text-md-left text-lg-right text-xl-right">
                                                        FC-NEE320-T | BUDIMAN FIRST CLASS
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('spj.show.detail',1) }}"  rel="noopener noreferrer">
                                <div class="card bg-light mb-3" >
                                    <div class="card-body">
                                        <div class="row">
                                                <div class="col-lg-6 text-left">
                                                    02 Februari 2020  |  08:00 - 15:00
                                                    <br/>
                                                     Bekasi (BKS) - Tasikmalaya (TSM)
                                                </div>
                                                <div class="col-lg-6 text-left text-sm-left text-md-left text-lg-right text-xl-right">
                                                    FC-NEE320-T | BUDIMAN FIRST CLASS
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
