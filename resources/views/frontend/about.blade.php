@extends('frontend.layout')

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/banner.png') }}');">

        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
              </div>

            </div>
          </div>
        </div>
      </div>



      <div class="site-section" style="background-color: #ADD8E6;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
            <img src="{{ asset('frontend/images/WA_PP.png') }}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-4 mr-auto">
            <h2>Nyetor Motor</h2>
            <p>membantu mempermudah perjalanan anda</p>
          </div>
        </div>
      </div>
    </div>

        @foreach($teams as $team)
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1">

                <img style="object-fit:cover;height: 80px;width:80px;" src="{{ Storage::url($team->photo) }}" alt="Image"
                 class="img-fluid">

              <div class="post-entry-1-contents">
                <span class="meta">{{ $team->jabatan }}</span>
                <h2>{{ $team->nama }}</h2>
                <p>{{ $team->bio }}</p>
              </div>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </div>

    <div class="site-section" style="background-color: #87cefa;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="{{ asset('frontend/images/about.png') }}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-4 ml-auto">
            <h2>Our History</h2>
              <p>{{ $setting->sejarah_perusahaan }}</p>
            </div>
        </div>
      </div>
    </div>
@endsection
