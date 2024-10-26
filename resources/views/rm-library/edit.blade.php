@extends('layouts.argon')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-6">
                    <div class="col-lg-6 col-7">
                        @if ($errors->any())
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h6 class="h2 text-white d-inline-block mb-0">Detail Retensi</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <form action="{{ url('/admin/rm/'. $rm->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Form</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nomor RM <span class="text-red">*</span></label>
                            <input type="text" name="rm" placeholder="076654" class="form-control" value="{{ $rm->rm }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap <span class="text-red">*</span></label>
                            <input type="text" name="nama" placeholder="Arizal Pratama" class="form-control" value="{{ $rm->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun <span class="text-red">*</span></label>
                            <input type="text" name="tahun" placeholder="2019" class="form-control" value="{{ $rm->tahun }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin <span class="text-red">*</span></label>
                            <select class="form-control" name="jenis_kelamin" value="" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki - Laki" {{ $rm->jenis_kelamin == "Laki - Laki" ? 'selected' : ''}}>Laki - Laki</option>
                                <option value="Perempuan" {{ $rm->jenis_kelamin == "Perempuan" ? 'selected' : ''}}>Perempuan</option>
                            </select> 
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Alamat <span class="text-primary">*</span></label>
                            <textarea name="" class="form-control"></textarea>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Form</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <label >Detail File</label>
                            <table class="table-kontrak table table-responsive align-items-center table-flush datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>File</th>
                                        <!-- <th>Hapus</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rm->retensis as $file)
                                    <tr>
                                        <td><a href="{{ url('uploads/rm/'. $rm->rm.'/'.$file->nama_file) }}" target="_blank">{{ $file->nama_file }}</a></td>
                                        <!-- <td><a href="{{ url('uploads/rm/'. $rm->rm.'/'.$file->nama_file) }}" class="btn btn-outline-warning float-right"><i class="fas fa-edit"></i>&nbsp Hapus File</a></td> -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- <button class="btn btn-outline-secondary" name="lagi" type="submit">Simpan & Baru</button> -->
                    <button class="btn btn-outline-primary float-right" type="submit"><i class="fa fa-save"></i>&nbsp Simpan</button>
                    <a href="{{ url('/admin/rm') }}" class="btn btn-outline-danger float-right"><i class="fas fa-backward"></i>&nbsp Kembali</a>
                    <!-- <a href="{{ url('/admin/rm') }}" class="btn btn-outline-warning float-right"><i class="fas fa-edit"></i>&nbsp Edit File</a>
                    <a href="{{ url('/admin/rm') }}" class="btn btn-outline-warning float-right"><i class="fas fa-edit"></i>&nbsp Edit Retensi</a> -->
                </div>
            </div>
        </div>
        </form>
        <!-- Footer -->
        @include('layouts.footers.nav')
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#task-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </script>
<!-- 
<script>
    const add = document.querySelectorAll(".input-group .add_detail")
    add.forEach(function(e){
        e.addEventListener('click', function(){
            let element = this.parentElement
            
            let newElement = document.createElement('div')
            newElement.classList.add('input-group', 'mb-3')
            newElement.innerHTML = `<input type="file" class="form-control" placeholder="file" name="file[]" aria-label="file" aria-describedby="button-addon2">
                <button class="btn btn-outline-danger remove_detail" type="button" id="button-addon2">Hapus</button>`
            document.getElementById('extra-detail').appendChild(newElement)

            document.querySelectorAll('.remove_detail').forEach(function(remove){
                remove.addEventListener('click',function(elmClick){
                    elmClick.target.parentElement.remove()
                    console.log(elmClick);
                })
            })
        })
    })
</script> -->
@endsection
