@extends('layouts.master')

@section('content')
    {{-- Toastr message --}}
    {!! Toastr::message() !!}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
    
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Berita</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Berita</li>
                        </ul>
                    </div>
                </div>
            </div>
    
            <div class="student-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="berita_id" placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="berita_judul" placeholder="Search by Judul ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Search by Tanggal ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
    
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Berita</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="#" class="btn btn-outline-primary me-2">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                        <a href="{{ route('berita/add/page') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Tambah Berita
                                        </a>
                                    </div>
                                </div>
                            </div>
    
                            <table class="table table-stripped table table-hover table-center mb-0" id="dataList">
                                <thead class="student-thread">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Delete --}}
    <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Hapus Berita</h3>
                        <p>Apakah Anda yakin ingin menghapus berita ini?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <form action="{{ route('berita/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="berita_id" class="e_berita_id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary" style="width: 100%;">Hapus</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
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
    {{-- DataTables --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataList').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                searching: true,
                ajax: {
                    url:"{{ route('get-data-list') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'judul',
                        name: 'judul',
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                    },
                    {
                        data: 'jam',
                        name: 'jam',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: "text-end",
                    },
                ]
            });

            // Mengatur nilai modal hapus saat mengklik tombol hapus
            $(document).on('click','.delete',function()
            {
                var _this = $(this).parents('tr');
                $('.e_berita_id').val(_this.find('.berita_id').data('berita_id'));
            });
        });
    </script>
@endsection
