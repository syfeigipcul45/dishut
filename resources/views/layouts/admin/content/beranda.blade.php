@extends('layouts.admin.template.template')

@section('title')
Beranda
@endsection

@section('beranda')
active
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <!-- <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="content">
                        <div class="text">SURAT PERINTAH TUGAS</div>
                        <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="content">
                        <div class="text">SURAT PERJALAN DINAS</div>
                        <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">DATA PEGAWAI</div>
                        <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- #END# Widgets -->
    </div>
</section>
<script>
    $(function() {
        //Widgets count
        $('.count-to').countTo();
    });
</script>
@endsection