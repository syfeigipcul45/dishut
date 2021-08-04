@extends('layouts.admin.template.template')

@section('title')
Bidang
@endsection

@section('halaman_web')
active
@endsection

@section('bidang')
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
                            Daftar bidang
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="{{route('bidang.create')}}" class="btn btn-primary waves-effect" role="button" aria-haspopup="true" aria-expanded="false">
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
                            <table id="tabel_bidang" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Sub Menu</th>
                                        <th>Isi Informasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($bidang as $item)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$item->sub_menu}}</td>
                                        <td>{{substr($item->isi_informasi,0,100)}}</td>
                                        <td>
                                            <!-- <form action="{{route('berita.destroy', $item->id)}}" method="POST"> -->
                                            <a class="btn btn-default btn-xs waves-effect" data-placement="top" title="Edit" id="btnEdit" name="btnEdit" href="{{route('bidang.edit', $item->id)}}"><i class="material-icons">edit</i></a>
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

                                                            <form action="{{route('bidang.destroy', $item->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
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
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#tabel_bidang').dataTable();
    });
</script>
@endsection