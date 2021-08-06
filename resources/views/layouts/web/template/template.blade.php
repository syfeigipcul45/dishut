<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dinas Kehutanan Prov. Kaltim | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicon-->
  <link rel="icon" href="{{asset('admin/images/logo.png')}}" type="image/x-icon">
  <link href="{{asset('admin/images/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('web/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('web/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v4.3.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a class="logo me-auto me-lg-0"><img src="{{asset('web/img/logo_login.png')}}" alt="" class="img-fluid"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{url('')}}" class="@yield('beranda')">Beranda</a></li>
          <li><a href="{{route('web.berita')}}" class="@yield('berita')">Berita</a></li>
          <li class="dropdown"><a href="#" class="@yield('profil')"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @inject('profil', 'App\Models\Menu')
              @php $sub_menu = $profil::where('menu','profil')->get(); @endphp
              @foreach($sub_menu as $item)
              <li><a href="{{route('web.slug.profil', $item->slug_sub_menu)}}">{{$item->sub_menu}}</a></li>
              @endforeach

              <!-- <li><a href="team.html">Visi dan Misi</a></li>
              <li><a href="testimonials.html">Struktur Organisasi</a></li> -->
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="@yield('bidang')"><span>Bidang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @inject('bidang', 'App\Models\Menu')
              @php $sub_menu = $bidang::where('menu','bidang')->get(); @endphp
              @foreach($sub_menu as $item)
              <li><a href="{{route('web.slug.bidang', $item->slug_sub_menu)}}">{{$item->sub_menu}}</a></li>
              @endforeach
            </ul>
          </li>

          <li><a href="{{route('web.data-kehutanan')}}" class="@yield('data-kehutanan')">Data Kehutanan</a></li>
          <li><a href="{{route('web.kontak')}}" class="@yield('kontak')">Kontak</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Dinas Kehutanan<br>Prov. Kaltim</h3>
            <p>
              Jl. Kesuma Bangsa, Sungai Pinang Luar, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75124 <br><br>
              <strong>Phone:</strong> (0541) 741963 - 741803 - 741807<br>Fax : 0541-736003<br>
              <strong>Email:</strong> dishut.kaltim@gmail.com - dishut.ppid@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-9 col-md-6 footer-links">
            <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.672014843328!2d117.14704221542426!3d-0.49067363541574044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f12db104b9d%3A0x3e75c847d9859547!2sDinas%20Kehutanan%20Provinsi%20Kaltim!5e0!3m2!1sid!2sid!4v1628042763806!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Dinas Kehutanan Prov. Kalimantan Timur</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('web/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('web/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('web/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <!-- <script src="{{asset('web/vendor/php-email-form/validate.js')}}"></script> -->
  <script src="{{asset('web/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('web/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



  <!-- Template Main JS File -->
  <script src="{{asset('web/js/main.js')}}"></script>

  <!-- Alert -->
  <link rel="stylesheet" type="text/css" href="{{asset('alert/css/iziToast.min.css')}}">
  <!-- Alert -->
  <script src="{{asset('alert/js/iziToast.min.js') }}"></script>


</body>

</html>