<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Website UMKM Kota Bengkulu</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Favicons -->
  <link href="{{ asset('front/img/Bengkulu.png') }}" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  
  <!-- Bootstrap CSS File -->
  <link href="{{ asset('front/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  
  <!-- Libraries CSS Files -->
  <link href="{{ asset('front/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('front/lib/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  
  <!-- Ganti gambar background home -->
  <style>
    #intro {
      width: 100%;
      position: relative;
      background: url("{{ asset('front/img/bg-bkl.png') }}") center bottom no-repeat;
      background-size: cover;
    }
    
    .tombol {
      background-color: #A9A9A9;
      color: white;
      opacity: 0.8;
      border-radius: 80%;
      height: 50px;
      width: 50px;
    }
  </style>
    
  </head>
  
  <body>
    
    <!--==========================
      Header
      ============================-->
      <header id="header" class="fixed-top" style="padding: 3px; height:fit-content; background-color: #5069c3">
        <div class="container">
          <nav class="main-nav float-left">
            <a href=""><img src="{{ asset('front/img/Bengkulu.png') }}" alt="" class="img-fluid" width="200"></a>
            <a href="{{ route('dashboard') }}" class="nav-2">Dashboard</a>
            <a href="{{ route('dashboard') }}" class="nav-2">Statistik</a>
            <a href="{{ route('dashboard') }}" class="nav-2">Kegiatan</a>
            <a href="{{ route('dashboard') }}" class="nav-2">Umkm</a>
            @if (!auth()->user())
              <a href="{{ route('login') }}" class="nav-2">Login</a>
            @else
              <a href="{{ route('admin') }}" class="nav-2">Admin</a>
            @endif
          </nav><!-- .main-nav -->
        </div>
      </header><!-- #header -->
      
      <main id="main">
    
        <!--==========================
            Deskripsi UMKM
            ============================-->
            <section id="why-us" class="wow fadeIn">
                <div class="container" style="padding-top: 50px;">
                    <header class="section-header">
                        <br>
                        <br>
                        <h3><b>{{$umkm->nama_usaha}}</b></h3>
                        <p>UMKM {{$umkm->nama_usaha}} adalah UMKM milik {{$umkm->pemilik_usaha}} yang bergerak di bidang {{$umkm->jenis}}.<br> 
                            Jika berminat pada barang atau jasa yang ditawarkan, dapat menghubungi media sosial {{$umkm->nama_usaha}}, yaitu {{ $umkm->media_promosi }} </p>
                        </header>
                    </div>
                </section>
                
                <!--==========================
                    Foto Produk Unggulan
                    ============================-->
                    <section id="portfolio" class="clearfix">
                        <div class="container">
                            
                            <header class="section-header">
                                <h3 class="section-title">Produk Unggulan</h3>
                                <p>Daftar produk unggulan dari UMKM {{$umkm->nama_usaha}} adalah </p>
                            </header>
                            
                            <div class="row portfolio-container">
                                @foreach ($data as $produk)
                                <div class="col-lg-3 col-md-6 portfolio-item">
                                    <div class="portfolio-wrap">
                                        <img src="{{ asset('images/'.$produk->gambar) }}" class="img-fluid" alt="">
                                        <p class="text-center">{{ $produk->nama_gambar }}</p>
                                        <div class="portfolio-info">
                                            <h4 style="color: white;">{{$produk->nama_gambar}}</h4>
                                            <div>
                                                <a href="{{ asset('images/'.$produk->gambar) }}" data-lightbox="portfolio" data-title="{{$produk->nama_gambar}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                    </section><!-- #portfolio (Produk Unggulan) -->
                    
                    <!--==========================
                        Alamat, Media Sosial, Maps
                        ============================-->
                        <section id="services" class="section-bg">
                            <div class="container">
                                
                                <div class="row wow fadeInUp">
                                    <div class="col-lg-6" style="padding-left: 50px;">
                                        <!-- Alamat dan Kontak -->
                                        <div class="row">
                                            <p>Alamat Lengkap : {{$umkm->alamat}}<br>
                                                Kontak : (+62){{$umkm->no_telpon}}
                                            </p>
                                        </div>
                                        <!-- Media Sosial -->
                                        <div class="row">
                                            <p>Media Sosial : <br>
                                                <i class="fa fa-instagram" aria-hidden="true"></i><a href="https://www.instagram.com/{{$umkm->media_promosi}}" target="_blank" title="Instagram"> {{$umkm->media_promosi}}</a><br>
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </section><!-- #services (Alamat, Media Sosial, Maps) -->
                    </main>
      
      <!--==========================
        Footer
        ============================-->
        <footer id="footer" style="background-color: #5069c3;">
          <div class="container">
            <div class="copyright">
              {{ Date('Y') }} &copy; <a href="https://bengkulukota.go.id/" style="color: black;" target="_blank"><strong>Kota Bengkulu</strong></a>
            </div>
            <div class="credits">
              Kelompok PPL Teknik Informatika Universitas Bengkulu
            </div>
          </div>
        </footer><!-- #footer -->
        
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->
        
        <!-- JavaScript Libraries -->
        <script src="{{ asset('front/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('front/lib/jquery/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('front/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('front/lib/mobile-nav/mobile-nav.js') }}"></script>
        <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('front/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('front/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('front/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('front/lib/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('front/lib/datatables/dataTables.bootstrap4.min.js') }}"></script>
        
        <!-- Template Main Javascript File -->
        <script src="{{ asset('front/js/main.js') }}"></script>
        
        <script>
          $(document).ready(function() {
            $('#example').DataTable();
          });
          $('#carousel-example').on('slide.bs.carousel', function(e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 3;
            var totalItems = $('.carousel-item').length;
            
            if (idx >= totalItems - (itemsPerSlide - 1)) {
              var it = itemsPerSlide - (totalItems - idx);
              for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                  $('.carousel-item').eq(i).appendTo('.carousel-inner');
                } else {
                  $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
              }
            }
          });
          $('.carousel').carousel({
            interval: 2000
          })
        </script>
        
      </body>
      
      </html>