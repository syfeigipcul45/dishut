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
                <h2>Daftar Berita</h2>
                <ol>
                    <li><a href="{{url('')}}">Berita</a></li>
                    <li>Daftar Berita</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach($berita as $item)
                    <article class="entry">

                        <div class="text-center">
                            @if($item->gambar_berita)
                            <img src="{{asset('admin/images/gambar_berita/'.$item->gambar_berita)}}" alt="{{asset('admin/images/gambar_berita/'.$item->gambar_berita)}}" class="img-fluid">
                            @endif
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('web.slug.berita', $item->slug_judul)}}">
                                <h5>{{$item->judul_berita}}</h5>
                            </a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i><span style="font-size: 10pt;">Administrator</span></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="{{$item->created_at}}"><span style="font-size: 10pt;">{{$item->created_at}}</span></time></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                <?php echo substr($item->isi_berita, 0, 300) ?> ....
                            </p>
                            <div class="read-more">
                                <a href="{{route('web.slug.berita', $item->slug_judul)}}">Read More</a>
                            </div>
                        </div>

                    </article>
                    @endforeach

                    <div class="blog-pagination">
                        {{ $berita->links('pagination::bootstrap-4') }}
                    </div>

                </div><!-- End blog entries list -->
                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="{{route('berita.search')}}" method="get">
                                <input type="text" placeholder="Cari Judul" name="cari">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Berita Populer</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach($popular as $item)
                            <div class="post-item clearfix">
                                <img src="{{asset('admin/images/gambar_berita/'.$item->gambar_berita)}}" alt="{{asset('admin/images/gambar_berita/'.$item->gambar_berita)}}">
                                <h4><a href="{{route('web.slug.berita', $item->slug_judul)}}">{{$item->judul_berita}}</a></h4>
                                <time datetime="{{$item->created_at}}">{{$item->created_at}}</time>
                            </div>
                            @endforeach
                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>
        </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection