@extends('frontend.layout')

@section('content')
<!-- Banner Section -->
<div class="hero" style="background-image: url('{{ asset('frontend/images/banner.png') }}')">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="row mb-5">
                    <div class="col-lg-7 intro">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cara Pemesanan Section -->

<head>
    <style>
        .step .number.text-primary {
            color: #003396 !important;
        }
    </style>
</head>


<div class="site-section" style="background-color:  #ffc40c ;">
    <div class="container">
        <h2 class="section-heading"><strong>Cara Pemesanan</strong></h2>
        <head>
    <style>
        .container .section-heading {
            color: #003390 !important;
        }
    </style>
</head>
        <p class="mb-5">Langkah yang mudah untuk menyewa motor</p>

        <div class="row mb-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="step">
                    <span>1</span>
                    <div class="step-inner">
                        <span class="number text-primary">01.</span>
                        <h3>Pilih Motor</h3>
                        <p>
                            Tersedia berbagai macam motor dengan kualitas perawatan terbaik.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="step">
                    <span>2</span>
                    <div class="step-inner">
                        <span class="number text-primary">02.</span>
                        <h3>Isi Form</h3>
                        <p>
                            Isi dengan data yang sesuai.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="step">
                    <span>3</span>
                    <div class="step-inner">
                        <span class="number text-primary">03.</span>
                        <h3>Pembayaran</h3>
                        <p>
                            Lakukan pembayaran setelah selesai melakukan pemesanan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Daftar motor Section -->
<div class="site-section" style="background-color: #ADD8E6;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center order-lg-2">
                <div class="img-wrap-1 mb-5">
                    <img
                        src="{{ asset('frontend/images/WA_PP.png') }}"
                        alt="Image"
                        class="img-fluid"
                    />
                </div>
            </div>
            <div class="col-lg-4 ml-auto order-lg-1">
                <h3 class="mb-4 section-heading">
                    <strong>
                        Kami berkomitmen untuk memberikan pelayanan terbaik
                    </strong>
                </h3>
                <p class="mb-5">
                    Nyetor hadir untuk mempermudah mobilitas mahasiswa dan wisatawan di bandung dengan motor yang terawat, harga terjangkau dan proses sewa yang cepat.
                </p>

                <p><a href="/kontak" class="btn btn-primary">Kontak Kami</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Daftar motor Section -->
<div class="site-section" style="background-color: #ffc40c ;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Daftar Motor</strong></h2>
                <p class="mb-5">
                    Tersedia berbagai macam motor dengan kualitas perawatan terbaik.
                </p>
            </div>
        </div>

        <div class="row d-flex flex-wrap justify-content-between">
            @foreach($motors as $motor)
                <div class="col-md-6 mb-4">
                    <div class="listing d-flex align-items-center">
                        <!-- Gambar Motor -->
                        <div class="listing-img mr-4">
                        <img src="{{ asset($motor->image) }}" alt="Image" class="img-fluid" />

                        </div>

                        <!-- Konten Motor -->
                        <div class="listing-contents">
                            <h3>{{ $motor->nama_motor }}</h3>
                            <div class="rent-price">
                                <strong>Rp{{ number_format($motor->price,0,",",".") }}</strong><span class="mx-1">/</span>jam
                            </div>
                            <p>{{ $motor->description }}</p>
                            <p>
                                <a href="{{ route('motor.show', $motor) }}" class="btn btn-primary btn-sm">Sewa</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Testimonial Section -->
<div class="site-section" style="background-color: #ADD8E6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Testimonial</strong></h2>
                <p class="mb-5">
                    berbagai testimoni pelanggan mengenai pelayanan kami.
                </p>
            </div>
        </div>
        <div class="row">
        @foreach($testimonials as $testimonial)
        <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="testimonial-2">
                    <!-- Ganti blockquote dengan gambar -->
                    <div class="d-flex v-card align-items-center">
                        <!-- Gambar Testimonial -->
                        <img
    src="{{ asset('frontend/images/testimonial' . $loop->iteration . '.png') }}"
    alt="Image"
    style="width: 100%; height: auto; object-fit: cover; border-radius: 0; margin: 0;"
    class="img-fluid"
/>


                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
