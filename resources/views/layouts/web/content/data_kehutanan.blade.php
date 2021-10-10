@extends('layouts.web.template.template')

@section('title')
Data Kehutanan
@endsection

@section('data_kehutanan')
active
@endsection

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>File Dokumen</h2>
                <ol>
                    <li><a href="{{url('')}}">Data Kehutanan</a></li>
                    <li>File Dokumen</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">
                    <article class="entry">
                        <div class="text-center">
                            <h1>Data Kehutanan</h1>
                        </div>

                        <div class="entry-meta">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <select class="form-group form-select form-select-sm" aria-label=".form-select-sm example" id="id_kategori">
                                        <option value="" selected>Pilih Kategori Dokumen</option>
                                        @foreach($kategori as $kategoris)
                                        <option value="{{$kategoris->id}}">{{$kategoris->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="entry-content">
                            <div class="table-responsive">
                                <table id="tabel_dokumen" class="hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dokumen</th>
                                            <th>File Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$no++}}.</td>
                                            <td>{{$item->nama_dokumen}}</td>
                                            <td>
                                                <a href="{{route('web.data-kehutanan.show',$item->id)}}" target="_blank" class="btn btn-info btn-sm">Lihat Data</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </article>

                </div><!-- End blog entries list -->

            </div><!-- End blog sidebar -->
        </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
<script>
    let flagURL = "{{route('web.data-kehutanan.searchByKategori')}}";
    $(document).ready(function() {
        $('#tabel_dokumen').dataTable();
    });

    $('#id_kategori').change(function() {
        let id_kategori = $(this).val();
        $.ajax({
            url: flagURL,
            method: "GET",
            data: {
                id_kategori: id_kategori,
            },
            dataType: 'json',
            success: function(data) {
                $('#tabel_dokumen').dataTable({
                    processing: true,
                    destroy: true,
                    data: data.hasil,
                    columns: [{
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1 + ".";
                            }
                        },
                        {
                            render: function(data, type, row, meta) {
                                return row.nama_dokumen;
                            }
                        },
                        {
                            render: function(data, type, row, meta) {
                                return '<a href="{{asset("data-kehutanan")}}/' + row.file_dokumen + '" target="_blank" class="btn btn-info btn-sm">Lihat Data</a>';
                            }
                        }
                    ]
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>
@endsection