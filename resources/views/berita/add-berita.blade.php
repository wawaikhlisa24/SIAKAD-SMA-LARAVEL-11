@extends('layouts.master')
@section('content')
    {{-- Toastr message --}}
    {!! Toastr::message() !!}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tambah Berita</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Berita</a></li>
                            <li class="breadcrumb-item active">Tambah Berita</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('berita/save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Detail Berita</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Informasi <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="informasi">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" name="tanggal" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Jam <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control timepicker" name="jam" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('berita/list/page') }}" class="btn btn-secondary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });

            $('.timepicker').timepicker({
                showMeridian: false,
                minuteStep: 1,
                defaultTime: false
            });
        });
    </script>
@endsection
