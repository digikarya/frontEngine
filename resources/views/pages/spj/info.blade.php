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
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Informasi SPJ</h6>
            </div>
            <div class="card-body py-0 ">
                <div class="card bg-light mb-3" >
                    <div class="card-body table-responsive">
                        <table class="table " >
                            @php
                                $klm_kiri = 2;
                                $brs_kiri = 8;
                                $klm_kanan = 2;
                                $brs_kanan = 9;
                                $seat_blkg = 5;
                                $max = $brs_kanan;
                                $totalKlm = $klm_kanan + $klm_kiri + 1;
                                if ($brs_kiri > $brs_kanan) {
                                    $max = $brs_kiri;
                                }
                                $kursi = 1;
                                for ($i=0; $i < $max; $i++) {
                                    echo "<tr>";
                                    for ($j=0; $j < $totalKlm; $j++) {
                                            // $kursi++;
                                        if ($j == ($klm_kiri)) {
                                            echo ' <td style="border:0;padding:0;" class="p-0"></td>';
                                        }else{
                                            if ($j < $klm_kiri) {
                                                if ($i < $brs_kiri) {
                                                    echo ' <td class="text-center border ">'. sprintf("%02d", $kursi).'</td>';
                                                    $kursi++;
                                                }else{
                                                    echo ' <td style="border:0;padding:0;" class=""></td>';
                                                }
                                            }else{
                                                if ($j < $totalKlm) {
                                                    if ($i < $brs_kanan) {
                                                        echo ' <td class="text-center border ">'. sprintf("%02d", $kursi).'</td>';
                                                        $kursi++;
                                                    }else{
                                                        echo ' <td style="border:0;padding:0;" class=""></td>';
                                                    }
                                                }
                                            }



                                        }
                                    }
                                    echo "</tr>";
                                }
                                for ($i=0; $i < $seat_blkg; $i++) {
                                    if ($i == 0) {
                                        echo "<tr>";
                                    }
                                    echo ' <td class="text-center border">'. sprintf("%02d", $kursi).'</td>';
                                    if ($i > $seat_blkg) {
                                        echo "</tr>";
                                    }
                                    $kursi++;

                                }
                            @endphp

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Informasi SPJ</h6>
            </div>
            <div class="card-body ">
                <table class="table ">
                    <tr>
                        <td width="50%" >
                            <h6 class="p-0 m-0"><b>Bis</b><br/>BUDIMAN FIRST CLASS</h6>
                        </td>
                        <td>
                            <h6 class="p-0 m-0"><b>Premire Class</b><br/>BUDIMAN FIRST CLASS</h6>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" >
                            <h6 class="p-0 m-0"><b>Jurusan</b><br/>Kp. Rambutan, Jakarta (KPR) - Tasikmalaya (TSM)</h6>
                        </td>
                        <td>
                            <h6 class="p-0 m-0"><b>Tanggal</b><br/>2021-02-02</h6>
                        </td>
                    </tr>

                    <tr>
                        <td width="50%" >
                            <h6 class="p-0 m-0"><b>Jam Keberangkatan</b><br/>09:00 WIB</h6>
                        </td>
                        <td>
                            <h6 class="p-0 m-0"><b>Jam Kedatangan</b><br/>16:00 WIB</h6>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" >
                            <h6 class="p-0 m-0"><b>Jumlah Kursi</b><br/>39 Kursi</h6>
                        </td>
                        <td>
                            <h6 class="p-0 m-0"><b>Jumlah Kursi Terisi</b><br/>5 Kursi</h6>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" >
                            <h6 class="p-0 m-0"><b>Jumlah Penumpang Selama Perjalanan</b><br/>5 Penumpang</h6>
                        </td>
                        <td>
                            <h6 class="p-0 m-0"><b>Jumlah Kursi Kosong</b><br/>34 Kursi</h6>
                        </td>
                    </tr>

                    <tr>
                        <td width="50%" >
                            <h6 class="p-0 m-0"><b>Supir</b><br/>Asep</h6>
                        </td>
                        <td>
                            <h6 class="p-0 m-0"><b>Kondektur</b><br/>Dadan</h6>
                        </td>
                    </tr>
                </table>
                <fieldset>
                    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
                    <div class="row">
                        {{-- <label class="col-form-label col-lg-2">Nama</label> --}}
                        <div class="col-lg-9">
                            <input type="number" class="form-control" placeholder="Masukan jumlah penumpang" name="value" >

                        </div>
                        <button type="submit" class="btn btn-primary " >Konfirmasi <i
                                class="icon-paperplane ml-2"></i></button>


                </div>
                </fieldset>

            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Data Penumpang</h6>
                <a  href="{{ route('spj.checkin',$id) }}" class="btn btn-primary" >Tambah Penumpang</a>
            </div>
            <div class="card-body py-0">
                <div class="row">

                </div>
            </div>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th width="5%">Kursi</th>
                        <th width="15%">Kode Tiket</th>
                        <th width="20%">Nama</th>
                        <th width="10%">HP</th>
                        <th width="20%">Titik Naik</th>
                        <th width="20%">Titik Turun</th>
                        <th width="20%">Status</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>-</td>
                        <td>Tatatng</td>
                        <td>-</td>
                        <td>Tasikmalaya</td>
                        <td>Bekasi</td>
                        <td>Perjalanan</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('').submit();">
                                            {{ __('Lihat Detail') }}
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('').submit();">
                                            {{ __('Turun') }}
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('delete-form-').submit();">
                                            {{ __('Delete') }}
                                        </a>
                                        <form id="update-form-" action="" method="POST" style="display: none;">
                                            @csrf
                                            @method("GET")
                                            <input type="hidden" name="id" value="">
                                        </form>
                                        <form id="delete-form-" action="" method="POST" style="display: none;">
                                            @csrf
                                            @method("delete")
                                            <input type="hidden" name="id" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Agen yang dilalui</h6>
            </div>
            <div class="card-body py-0">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('spj.show.detail',1) }}"  rel="noopener noreferrer">
                            <div class="card bg-success mb-3" >
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-6 text-left">
                                                Tasikmalaya
                                                <br/>

                                            </div>
                                            <div class="col-lg-6 text-left text-sm-left text-md-left text-lg-right text-xl-right">
                                               confrimed at 01/02/2021 08:00
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
                            <div class="card bg-slate mb-3" >
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-6 text-left">
                                                Agen Bandung
                                                <br/>

                                            </div>
                                            <div class="col-lg-6 text-left text-sm-left text-md-left text-lg-right text-xl-right">
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
                            <div class="card bg-slate mb-3" >
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-6 text-left">
                                                Agen Bekasi
                                                <br/>
                                                confrimed at 01/02/2021 08:00

                                            </div>
                                            <div class="col-lg-6 text-left text-sm-left text-md-left text-lg-right text-xl-right">

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
