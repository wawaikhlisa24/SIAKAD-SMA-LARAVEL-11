@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Edit Mata Pelajaran</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="subjects.html">Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active">Edit Mata Pelajaran</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('subject/update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informasi Mata Pelajaran</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>ID Mata Pelajaran <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="subject_id" value="{{ $subjectEdit->subject_id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Mata Pelajaran <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="subject_name" value="{{ $subjectEdit->subject_name }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Kelas <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="class" value="{{ $subjectEdit->class }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Perbarui</button>
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
