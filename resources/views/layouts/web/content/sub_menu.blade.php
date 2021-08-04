@extends('layouts.web.template.template')

@section('title')
{{$data->sub_menu}}
@endsection

@if($data->menu == 'profil')
<?php $active = 'profil'; ?>
@else
<?php $active = 'bidang'; ?>
@endif
@section($active)
active
@endsection

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{$data->sub_menu}}</h2>
                <ol>
                    <li><a href="{{url('')}}">{{ucfirst($active)}}</a></li>
                    <li>{{$data->sub_menu}}</li>
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

                        <div class="entry-content">
                            <p>
                                <?php echo $data->isi_informasi ?>
                            </p>
                        </div>

                    </article>

                </div><!-- End blog entries list -->

            </div><!-- End blog sidebar -->
        </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection