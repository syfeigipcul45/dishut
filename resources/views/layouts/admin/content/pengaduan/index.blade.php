@extends('layouts.admin.template.template')

@section('title')
Daftar Pengaduan
@endsection

@section('pengaduan')
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
                            Daftar Pengaduan
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
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
                            <table id="tabel_berita" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subjek</th>
                                        <th>Isi Berita</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($pengaduan as $item)
                                    <tr>
                                        <td>{{$no++}}.</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->subjek}}</td>
                                        <td>{{substr($item->isi_pesan,0,100)}}</td>
                                        <td>
                                            <a class="btn btn-info btn-xs waves-effect" data-placement="top" title="Edit" href="{{route('pengaduan.show', $item->id)}}"><i class="material-icons">remove_red_eye</i></a>
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
        $('#tabel_berita').dataTable();
    });
</script>
@endsection