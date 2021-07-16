@extends('layouts.web.template.template')

@section('title')
Beranda
@endsection

@section('berita')
active
@endsection

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Berita</h2>
                <ol>
                    <li><a href="{{url('')}}">Beranda</a></li>
                    <li>Berita</li>
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
                            @if($berita->gambar_berita)
                            <img src="{{asset('admin/images/gambar_berita/'.$berita->gambar_berita)}}" alt="{{asset('admin/images/gambar_berita/'.$berita->gambar_berita)}}" class="img-fluid">
                            @endif
                        </div>

                        <h2 class="entry-title">
                            <a href="">
                                <h5>{{$berita->judul_berita}}</h5>
                            </a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i><span style="font-size: 10pt;">Administrator</span></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="{{$berita->created_at}}"><span style="font-size: 10pt;">{{$berita->created_at}}</span></time></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                <?php echo $berita->isi_berita ?>
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