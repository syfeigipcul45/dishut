@extends('layouts.web.template.template')

@section('title')
Kontak
@endsection

@section('kontak')
active
@endsection

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Kontak</h2>
        <ol>
          <li><a href="{{url('')}}">Beranda</a></li>
          <li>Kontak</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <div class="map-section">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.672014843328!2d117.14704221542426!3d-0.49067363541574044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f12db104b9d%3A0x3e75c847d9859547!2sDinas%20Kehutanan%20Provinsi%20Kaltim!5e0!3m2!1sid!2sid!4v1628042763806!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
  </div>

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Kesuma Bangsa, Sungai Pinang Luar, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75124</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com<br>contact@example.com</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10">
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <form action="{{route('web.kontak.store')}}" method="post" role="form" class="php-email-form">
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subjek" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="isi_pesan" rows="5" placeholder="Message" required></textarea>
            </div>
            <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection