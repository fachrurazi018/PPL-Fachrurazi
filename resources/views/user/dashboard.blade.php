@extends('layouts.headuser')

@section('content')
<!--==========================
    Intro Section
    ============================-->
<section id="intro" class="clearfix">
    <div class="container">
        <div class="intro-info">
            <div>
                <h4><mark style="opacity: 0.7; background-color:floralwhite">Selamat Datang di</mark></h4>
            </div>
            <h2><mark style="opacity: 0.8; background-color:ghostwhite">Website UMKM Kota Bengkulu</mark></h2>
        </div>
    </div>
</section><!-- #intro -->

<main id=" main">

    <!--==========================
            Statistik
            ============================-->
    <section id="why-us" class="wow fadeIn">
        <div class="container">
            <header class="section-header">
                <h3>Statistik UMKM</h3>
            </header>

            <div class="row counters">

                <div class="col-lg-12 col-12 text-center">
                    <span data-toggle="counter-up">{{ $umkm->count() }}</span>
                    <p>UMKM</p>
                </div>

            </div>

        </div>
    </section>

    <section id="testimonials" class="section-bg">
        <div class="container col-lg-12">
            <header class="section-header">
                <h3>Dokumentasi Kegiatan UMKM</h3>
            </header>
            <div class="container-fluid">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        @if($kegiatan->count() > 0)
                        @foreach($kegiatan as $dokumentasi)
                        <div class="carousel-item col-12 col-sm-6 col-md-6 col-lg-4 {{($dokumentasi->gambar_kegiatan == $dokumentasi->first()->gambar_kegiatan) ? 'active' : ''}}">
                            <img src="{{ asset('images/'.$dokumentasi->gambar_kegiatan) }}" class="img-fluid mx-auto d-block" alt="">
                            <div class="text-center">
                                <h4><b>{{ $dokumentasi->nama_kegiatan }}</b></h4>
                                <h5>Yang diselenggarakan oleh {{ $dokumentasi->umkm->nama_usaha }}</h5>
                                <p>{{ $dokumentasi->penjelasan }}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center col-12">
                            <p>Belum ada foto kegiatan yang ditambahkan</p>
                        </div>
                        @endif
                    </div>
                    <a class="tombol carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="tombol carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>

    </section>

    <!--==========================
            Daftar UMKM
            ============================-->
    <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>Daftar UMKM Kota Bengkulu</h3>
            </header>

            <div class="row about-container">

                <div class="col-lg-12 content">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th style="width: 15%">No</th> -->
                                <th>UMKM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($umkm as $usaha)
                            <tr>
                                <!-- <td>{{ $loop->iteration }}</td> -->
                                <td><a href="{{ route('detail', ['umkm' => $usaha->id]) }}">{{ $usaha->nama_usaha }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
    </section><!-- #about -->

</main>
@endsection