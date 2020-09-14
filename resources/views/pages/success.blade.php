@extends('layouts.success')

@section('title', 'CHECKOUT SUCCESS')

@section('content')
<!-- main content start -->
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/checkout-succes.png') }}" alt="success-checkout">
            <h1>Checkout Succes!</h1>
            <p>We've sent you email for trip
                <br>
                instruction please read it as well
            </p>
            <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">
                Home page
            </a>
        </div>
    </div>
</main>
@endsection