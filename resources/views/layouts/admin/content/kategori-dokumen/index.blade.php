@extends('layouts.admin.template.template')

@section('title')
Kategori Dokumen
@endsection

@section('kategori_dokumen')
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
                            Kategori Dokumen
                        </h2>
                    </div>
                    <div class="body">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{route('kategori-dokumen.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <h2 class="card-inside-title">Nama Kategori</h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                        <br>
                        <div class="table-responsive">
                            <table id="tabel_dokumen" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$item->nama_kategori}}</td>
                                        <td>
                                            <!-- <form action="{{route('berita.destroy', $item->id)}}" method="POST"> -->
                                            <a href="" data-toggle="modal" data-target="#edit-Modal{{$item->id}}" data-id="{{$item->id}}" class="btn btn-warning btn-xs"><i class="material-icons">edit</i></a>

                                            <div class="modal fade" id="edit-Modal{{$item->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="edit-data">
                                                            <form action="{{route('kategori-dokumen.update', $item->id)}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="card-block">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label" style="font-weight: bold;">Nama Kategori</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" name="nama_kategori_edit" value="{{ $item->nama_kategori }}">
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
                                            <!-- @csrf -->
                                            <!-- @method('DELETE') -->
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" data-placement="top" title="Hapus"><i class="material-icons" onclick="return confirm('Apakah data yakin di hapus?')">delete</i></button> -->
                                            <!-- <a class="btn btn-danger btn-xs waves-effect" data-placement="top" title="Hapus" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class="material-icons">delete</i></a> -->
                                            <!-- </form> -->
                                            <!-- <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                                            <form action="{{route('kategori-dokumen.destroy', $item->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a type="button" class="btn btn-warning" data-dismiss="modal">Tidak</a>
                                                                <button type="submit" class="btn btn-primary">Ya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
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
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#tabel_dokumen').dataTable();
    });
</script>
@endsection