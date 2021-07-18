@extends('layouts.admin.template.template')

@section('title')
Daftar Gambar
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
                            Daftar Gambar
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
                            <table id="tabel_gambar" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($slide as $item)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td><img src="{{asset('web/slide-gambar/'.$item->file_gambar)}}" style="max-height: 75px; max-width: 50;" alt="{{$item->file_gambar}}"></td>
                                        <td>
                                            <!-- <form action="{{route('berita.destroy', $item->id)}}" method="POST"> -->
                                            <a href="" data-toggle="modal" data-target="#edit-Modal{{$item->id}}" data-id="{{$item->id}}" class="btn btn-warning btn-xs"><i class="material-icons">edit</i></a>

                                            <div class="modal fade" id="edit-Modal{{$item->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Upload Gambar</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="edit-data">
                                                            <form action="{{route('slide.update', $item->id)}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <!-- @method('PUT') -->
                                                                <div class="card-block">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label" style="font-weight: bold;">File Gambar</label>
                                                                        <div class="col-sm-10">
                                                                            <span style="font-size: 12px; font-style: italic; color: red;">*) File harus berupa .jpg, .jpeg, .png</span>
                                                                            <input type="file" class="form-control" name="file_gambar" id="file_edit{{$item->id}}" accept="images/*">
                                                                            <img class="b p-xs" style="max-width: 400px; max-height: 200px;" src="{{asset('web/slide-gambar/'.$item->file_gambar)}}" id="output_edit{{$item->id}}">
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

                                                            <form action="{{route('slide.destroy', $item->id)}}" method="POST">
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
                        <h4 class="modal-title">Upload Gambar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="input-data">
                        <form action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-block">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-weight: bold;">File Gambar</label>
                                    <div class="col-sm-10">
                                        <span style="font-size: 12px; font-style: italic; color: red;">*) File harus berupa .jpg, .jpeg, .png</span>
                                        <input type="file" class="form-control" name="file_gambar" id="file" accept="images/*" required>
                                        <img class="b p-xs" style="max-width: 400px; max-height: 200px;" id="output">
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
        $('#tabel_gambar').dataTable();
    });
</script>
@endsection