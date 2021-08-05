@extends('layouts.admin.template.template')

@section('title')
Daftar Data Kehutanan
@endsection

@section('slide')
active
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Daftar Dokumen
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#default-Modal" role="button" aria-haspopup="true" aria-expanded="false">
                                    Tambah Data
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        
                        <div class="table-responsive">
                            <table id="tabel_dokumen" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Dokumen</th>
                                        <th>Kategori Dokumen</th>
                                        <th>File Dokumen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$item->nama_dokumen}}</td>
                                        <td>{{$item->nama_kategori}}</td>
                                        <td>
                                            <a href="{{route('data-kehutanan.show',$item->id)}}" target="_blank" class="btn btn-info btn-sm">Lihat Data</a>
                                        </td>
                                        <td>
                                            <!-- <form action="{{route('berita.destroy', $item->id)}}" method="POST"> -->
                                            <a href="" data-toggle="modal" data-target="#edit-Modal{{$item->id}}" data-id="{{$item->id}}" class="btn btn-warning btn-xs"><i class="material-icons">edit</i></a>

                                            <div class="modal fade" id="edit-Modal{{$item->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Upload File</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="edit-data">
                                                            <form action="{{route('data-kehutanan.update', $item->id)}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <!-- @method('PUT') -->
                                                                <div class="card-block">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label" style="font-weight: bold;">Nama Dokumen</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" name="nama_dokumen" placeholder="Nama Dokumen" value="{{ $item->nama_dokumen }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label" style="font-weight: bold;">Kategori Dokumen</label>
                                                                        <div class="col-sm-10">
                                                                            <select class="form-control show-tick" name="id_kategori" required>
                                                                                @foreach($kategori as $data)                                                                                
                                                                                <option value="{{$data->id}}" <?php if($item->id_kategori == $data->id) echo "selected"; ?> >{{$data->nama_kategori}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label" style="font-weight: bold;">File Dokumen</label>
                                                                        <div class="col-sm-10">
                                                                            <span style="font-size: 12px; font-style: italic; color: red;">*) File harus berupa .pdf, maksimal file sebesar 5 MB</span>
                                                                            <input type="file" class="form-control" name="file_dokumen" id="file_edit{{$item->id}}" accept=".pdf" >
                                                                            <embed type="application/pdf" src="{{asset('data-kehutanan/'.$item->file_dokumen)}}" id="output_edit{{$item->id}}" width="400px" height="200px"></embed>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label" style="font-weight: bold;"></label>
                                                                        <div class="col-sm-10">
                                                                            <button type="submit" class="btn btn-success" id="btnSimpan">Simpan</button>
                                                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <script text="text/javascript">
                                                                $('#file_edit{{$item->id}}').change(function() {
                                                                    let size = document.getElementById('file_edit{{$item->id}}').files[0].size / 1024 / 1024;
                                                                    let extension = $('#file_edit{{$item->id}}').val().split('.').pop().toLowerCase();
                                                                    if ((jQuery.inArray(extension, ['pdf']) == -1) && size > 5) {
                                                                        iziToast.error({
                                                                            title: 'Error',
                                                                            message: 'File Tidak Sesuai dan ukuran file terlalu besar',
                                                                            position: 'topCenter'
                                                                        });
                                                                        $('#file_edit{{$item->id}}').val("");
                                                                    } else if ((jQuery.inArray(extension, ['pdf']) == -1)) {
                                                                        iziToast.error({
                                                                            title: 'Error',
                                                                            message: 'File tidak sesuai',
                                                                            position: 'topCenter'
                                                                        });
                                                                        $('#file_edit{{$item->id}}').val("");
                                                                        return false;
                                                                    } else if (size > 5) {
                                                                        iziToast.error({
                                                                            title: 'Error',
                                                                            message: 'File terlalu besar',
                                                                            position: 'topCenter'
                                                                        });
                                                                        $('#file_edit{{$item->id}}').val("");
                                                                        return false;
                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- @csrf -->
                                            <!-- @method('DELETE') -->
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" data-placement="top" title="Hapus"><i class="material-icons" onclick="return confirm('Apakah data yakin di hapus?')">delete</i></button> -->
                                            <a class="btn btn-danger btn-xs waves-effect" data-placement="top" title="Hapus" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class="material-icons">delete</i></a>
                                            <!-- </form> -->
                                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form action="{{route('data-kehutanan.destroy', $item->id)}}" method="POST">
                                                                @csrf
                                                                <!-- @method('DELETE') -->
                                                                <a type="button" class="btn btn-warning" data-dismiss="modal">Tidak</a>
                                                                <button type="submit" class="btn btn-primary">Ya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="input-data">
                        <form action="{{route('data-kehutanan.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-block">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-weight: bold;">Nama Dokumen</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_dokumen" placeholder="Nama Dokumen" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-weight: bold;">Kategori Dokumen</label>
                                    <div class="col-sm-10">
                                        <select class="form-control show-tick" name="id_kategori" required>
                                            <option value="" disabled selected>-- Please select --</option>
                                            @foreach($kategori as $item)
                                            <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-weight: bold;">File Dokumen</label>
                                    <div class="col-sm-10">
                                        <span style="font-size: 12px; font-style: italic; color: red;">*) File harus berupa .pdf, maksimal file sebesar 5 MB</span>
                                        <input type="file" class="form-control" name="file_dokumen" id="file_dokumen" accept=".pdf" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-weight: bold;"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success" id="btnSimpan">Simpan</button>
                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#tabel_dokumen').dataTable();
    });
    $('#file_dokumen').change(function() {
        let size = document.getElementById('file_dokumen').files[0].size / 1024 / 1024;
        let extension = $('#file_dokumen').val().split('.').pop().toLowerCase();
        if ((jQuery.inArray(extension, ['pdf']) == -1) && size > 5) {
            iziToast.error({
                title: 'Error',
                message: 'File Tidak Sesuai dan ukuran file terlalu besar',
                position: 'topCenter'
            });
            $('#file_dokumen').val("");
        } else if ((jQuery.inArray(extension, ['pdf']) == -1)) {
            iziToast.error({
                title: 'Error',
                message: 'File tidak sesuai',
                position: 'topCenter'
            });
            $('#file_dokumen').val("");
            return false;
        } else if (size > 5) {
            iziToast.error({
                title: 'Error',
                message: 'File terlalu besar',
                position: 'topCenter'
            });
            $('#file_dokumen').val("");
            return false;
        }
    });
</script>
@endsection