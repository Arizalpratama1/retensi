@extends('layouts.argon')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row align-items-center py-1">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Daftar Rekam Medik</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ url('admin/rm/create') }}" class="btn btn-neutral fas fa-plus">&nbsp Tambah Data</a>
                        <!-- <a href="{{ url('users/export') }}" class="btn btn-neutral">Export Excel</a> -->
                        <!-- <a href="{{ url('admin/export/PDF') }}" class="btn btn-neutral">Export PDF</a>
                                <a href="{{ url('export-admin') }}" class="btn btn-neutral">Export Excel</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Daftar Rekam Medik</h3>
                            </div>
                        </div>
                    </div>
                    <!-- <div class=""> -->
                    <div class="">
                        <!-- Projects table -->
                        <table class="table-kontrak table table-responsive align-items-center table-flush datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1%">No.</th>
                                    <th style="width:1%">Nomor RM</th>
                                    <th style="width:1%">Nama</th>
                                    <th style="width:1%">Tahun</th>
                                    <th style="width:1%">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rm as $Rm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Rm->rm }}</td>
                                        <td>{{ $Rm->nama }}</td>
                                        <td>{{ $Rm->tahun }}</td>
                                        <td>{{ $Rm->jenis_kelamin }}</td>
                                        <td>{!! Str::limit($Rm->alamat, 25) !!}</td>
                                        <td>
                                            <a href="/admin/artikel/{{ $Rm->id }}"
                                                class="badge badge-light-secondary">
                                                <i class="fas fa-solid fa-eye"></i>
                                                Lihat
                                            </a>
                                            <a href="{{ url('/admin/artikel/' . $Rm->id) }}/edit"
                                                class="badge badge-light-secondary">
                                                <i class="fas fa-edit"></i>
                                                Ubah
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.nav')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/js/datatables.min.js "></script>
    <script>
        $(document).ready(function() {
            $('.table-kontrak').DataTable({
                "lengthMenu": [
                    [100, 200, -1],
                    [100, 200, "All"]
                ]
            });
        });
    </script>
    <!-- <script>
        $(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('/admin/kontrak') }}',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'judul_kontrak',
                        name: 'judul_kontrak'
                    },
                    {
                        data: 'provinsi',
                        name: 'provinsi'
                    },
                    {
                        data: 'kabupaten',
                        name: 'kabupaten'
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan'
                    },
                    {
                        data: 'id_desa',
                        name: 'id_desa'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                lengthMenu: [
                    [100, 200, -1],
                    [100, 200, "All"]
                ]
            })
            // console.log()
            // styling wrapper
            $('.dataTables_wrapper').addClass('py-2')

            $('<div id="header-datatable" class="d-flex justify-content-between" ></div>').prependTo(
                '.dataTables_wrapper')
            $('.dataTables_length').appendTo('#header-datatable')
            $('.dataTables_filter').appendTo('#header-datatable')

            // styling orderable
            $('.dataTables_length label')[0].childNodes[0].nodeValue = ''
            $('.dataTables_length label')[0].childNodes[2].nodeValue = ''
            $('.dataTables_length').addClass('p-0')
            $('.dataTables_length').css('float', 'none')
            $('.dataTables_length select').addClass('form-control form-control-sm form-control-alternative')

            // styling filter
            $('.dataTables_filter label')[0].childNodes[0].nodeValue = ''
            $('.dataTables_filter input').addClass('form-control form-control-sm form-control-alternative')
            $('.dataTables_filter input').attr('placeholder', 'search...')
            $('.dataTables_filter').css('float', 'none')
            $('.dataTables_filter').css('padding-right', '10px')

            // styling table
            $('.dataTable').removeClass('no-footer')
        })
    </script> -->
@endpush
