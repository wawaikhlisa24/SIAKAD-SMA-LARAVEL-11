@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Siswa</h3>
                            {{-- <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Siswa</a></li>
                                <li class="breadcrumb-item active">Edit Siswa</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('student/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="id" value="{{ $studentEdit->id }}" readonly>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Informasi Siswa
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Awal <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $studentEdit->first_name }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Akhir <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $studentEdit->last_name }}">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jenis Kelamin <span class="login-danger">*</span></label>
                                            <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                                <option selected disabled>Pilih Jenis Kelamin</option>
                                                <option value="Perempuan" {{ $studentEdit->gender == 'Perempuan' ? "selected" :""}}>Perempuan</option>
                                                <option value="Laki-Laki" {{ $studentEdit->gender == 'Laki-Laki' ? "selected" :""}}>Laki-Laki</option>
                                                <option value="Lainnya" {{ $studentEdit->gender == 'Lainnya' ? "selected" :""}}>Lainnya</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Tanggal Lahir <span class="login-danger">*</span></label>
                                            <input class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text"  value="{{ $studentEdit->date_of_birth }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>NIS </label>
                                            <input class="form-control @error('roll') is-invalid @enderror" type="text" name="roll" value="{{ $studentEdit->roll }}">
                                            @error('roll')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Golongan Darah <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('blood_group') is-invalid @enderror" name="blood_group">
                                                <option selected disabled>Pilih Golongan Darah</option>
                                                <option value="A+" {{ $studentEdit->blood_group == 'A+' ? "selected" :""}}>A+</option>
                                                <option value="B+" {{ $studentEdit->blood_group == 'B+' ? "selected" :""}}>B+</option>
                                                <option value="O+" {{ $studentEdit->blood_group == 'O+' ? "selected" :""}}>O+</option>
                                            </select>
                                            @error('blood_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Agama <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('religion') is-invalid @enderror" name="religion">
                                                <option selected disabled>Pilih Agama</option>
                                                <option value="Islam" {{ $studentEdit->religion == 'Islam' ? "selected" :""}}>Islam</option>
                                                <option value="Hindu" {{ $studentEdit->religion == 'Hindu' ? "selected" :""}}>Hindu</option>
                                                <option value="Kristen" {{ $studentEdit->religion == 'Kristen' ? "selected" :""}}>Kristen</option>
                                                <option value="Budha" {{ $studentEdit->religion == 'Budha' ? "selected" :""}}>Budha</option>
                                                <option value="Konghucu" {{ $studentEdit->religion == 'Konghucu' ? "selected" :""}}>Konghucu</option>
                                                <option value="Lainnya" {{ $studentEdit->religion == 'Lainnya' ? "selected" :""}}>Lainnya</option>
                                            </select>
                                            @error('religion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>E-Mail <span class="login-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"  value="{{ $studentEdit->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Kelas <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('class') is-invalid @enderror" name="class">
                                                <option selected disabled>Pilih Kelas</option>
                                                <option value="12" {{ $studentEdit->class == '12' ? "selected" :""}}>12</option>
                                                <option value="11" {{ $studentEdit->class == '11' ? "selected" :""}}>11</option>
                                                <option value="10" {{ $studentEdit->class == '10' ? "selected" :""}}>10</option>
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Seksi <span class="login-danger">*</span></label>
                                            <select class="form-control select @error('section') is-invalid @enderror" name="section">
                                                <option selected disabled>Pilih Seksi</option>
                                                <option value="A" {{ $studentEdit->section == 'A' ? "selected" :""}}>A</option>
                                                <option value="B" {{ $studentEdit->section == 'B' ? "selected" :""}}>B</option>
                                                <option value="C" {{ $studentEdit->section == 'C' ? "selected" :""}}>C</option>
                                            </select>
                                            @error('section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>ID Penerimaan </label>
                                            <input class="form-control @error('admission_id') is-invalid @enderror" type
                                            input class="form-control @error('admission_id') is-invalid @enderror" type="text" name="admission_id" value="{{ $studentEdit->admission_id }}">
                                            @error('admission_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Telepon </label>
                                            <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" value="{{ $studentEdit->phone_number }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-sm-4">
                                        <div class="form-group students-up-files">
                                            <label>Upload Foto Siswa (150px X 150px)</label>
                                            <div class="uplod">
                                                <h2 class="table-avatar">
                                                    <a class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ Storage::url('student-photos/'.$studentEdit->upload) }}" alt="User Image">
                                                    </a>
                                                </h2>
                                                <label class="file-upload image-upbtn mb-0 @error('upload') is-invalid @enderror">
                                                    Pilih File <input type="file" name="upload">
                                                </label>
                                                <input type="hidden" name="image_hidden" value="{{ $studentEdit->upload }}">
                                                @error('upload')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
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

