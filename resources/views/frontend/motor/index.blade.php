@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/banner.png') }}')"
      >
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-5">
              <div class="intro">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Daftar motor Section -->
<div class="site-section" style="background-color: #ADD8E6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Daftar Motor</strong></h2>
                <p class="mb-5">
                    Kami menyediakan berbagai macam motor.
                </p>
            </div>
        </div>

        <!-- Grid Motor -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
            @foreach($motors as $motor)
                <div class="col-6 col-md-6 mb-4">
                    <div class="listing d-flex align-items-center">
                        <!-- Gambar Motor -->
                        <div class="listing-img mr-4" style="margin-bottom: 10px;">
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
@endsection
