@extends('layouts.app')

@section('title', 'DETAIL TRAVEL')

@section('content')
<!-- main content start -->
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Paket travel</li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p>{{ $item->location }}</p>
                        @if ($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url($item->galleries->first()->image) }}" alt="details" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image ) }}">
                            </div>
                            <div class="xzoom-thumbs">
                                @foreach ($item->galleries as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}">
                                    <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="130" xpreview="{{ Storage::url($gallery->image) }}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Tentang wisata</h2>
                        <p> 
                            {!! $item->about !!}
                        </p>
                        <div class="row features">
                            <div class="col-md-4">
                                <div class="description">
                                    <img src="{{ url('frontend/images/ic-tari.png') }}" alt="" class="features-img">
                                    <div class="description">
                                        <h3>Event</h3>
                                        <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <div class="description">
                                    <img src="{{ url('frontend/images/ic-bahasa.png') }}" alt="" class="features-img">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <div class="description">
                                    <img src="{{ url('frontend/images/ic-food.png') }}" alt="" class="features-img">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $item->food }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="{{ url('frontend/images/member-1.png') }}" alt="member1" class="member-image mr-1">
                            <img src="{{ url('frontend/images/member-2.png') }}" alt="member2" class="member-image mr-1">
                        </div>
                        <hr>
                        <h2>Trip Information</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">
                                    Date Of Departure
                                </th>
                                <td width="50%" class="text-right">
                                    {{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">
                                    {{ $item->duration }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Type Of Trip</th>
                                <td width="50%" class="text-right">
                                    {{ $item->type }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">
                                    ${{ $item->price }},00 / Person
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                            <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                            @csrf
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                    Join Now
                                </button>
                            </form>
                        @endauth
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                           Login or Register TO JOIN
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main content ends -->
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            xoffset: 15

        });
    });
</script>
@endpush