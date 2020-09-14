@extends ('layouts.app')

@section('title')
NOMADS
@endsection

@section('content')
<!-- header -->
<header class="text-center">
    <h1> Explore the world
        <br>
        As Easy As One Click
    </h1>
    <p class="mt-3"> You will see beautiful
        <br>
        moment you never see before
    </p>
    <a href="#popular" class="btn btn-get-start px-4 mt-4">
        Get Started
    </a>
</header>
<!-- header ends -->
<main>
    <!-- statistik -->
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3k</h2>
                <p>Hotel</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Partner</p>
            </div>
        </section>
    </div>
    <!-- statistik end -->
    <!-- wisata start -->
    <section class="popular" id="wisata-popular">
        <div class="container">
            <div class="row">
                <div class="col text-center popular-heading">
                    <h2>Wisata Popular</h2>
                    <p>Something you that never try
                        <br>
                        before in this world.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-content" id="popularcontent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                        <div class="travel-country">{{ $item->location }}</div>
                        <div class="travel-location">{{ $item->title }}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-detail px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- wisata ends -->
    <!-- networks start -->
    <section class="networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>Companies are trusted us
                        <br>
                        More that just a trip
                    </p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="frontend/images/partner.png" alt="img partner" class="img-partner">
                </div>
            </div>
        </div>
    </section>
    <!-- networkds end -->
    <!-- testimonial start -->
    <section class="testimonial-heading" id="testimonialheading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>They’re Loving Us</h2>
                    <p>Moments were giving them
                        <br>
                        The best experience
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="testimonial-content" id="testimonialcontent">
        <div class="container">
            <div class="row testimonial-popular-content justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card testimonial-card text-center">
                        <div class="testimoni-content">
                            <img src="frontend/images/testimonial-1.png" alt="testione" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Ary</h3>
                            <p class="testi">Its was glorius and i could
                                non stop to say wonderful
                                for every single moment
                            </p>
                        </div>
                        <hr>
                        <p class="trip mt-2">
                            Trip to Nusa penida, Bali
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card testimonial-card text-center">
                        <div class="testimoni-content">
                            <img src="frontend/images/testimonial-2.png" alt="testione" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Antara</h3>
                            <p class="testi">Its was glorius and i could
                                non stop to say Goods
                                for every moment
                        </div>
                        <hr>
                        <p class="trip mt-2">
                            Trip to Bromo, Malang
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card testimonial-card text-center">
                        <div class="testimoni-content">
                            <img src="frontend/images/testimonial-3.png" alt="testione" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Satria</h3>
                            <p class="testi">Its was glorius and i could
                                non stop to say Yeaht
                            </p>
                        </div>
                        <hr>
                        <p class="trip mt-2">
                            Trip to Nusa penida, Bali
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-lg btn-help px-4 mt-5 mx-1">
                        I NEED HELP
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-lg btn-get-started px-4 mt-5 mx-1">
                        GET STARTED
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- main ends -->
@endsection