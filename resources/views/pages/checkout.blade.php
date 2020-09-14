@extends('layouts.checkout')

@section('title', 'CHECKOUT')

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
                            <li class="breadcrumb-item">Details</li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <h1>Who’s Going ?</h1>
                        <p>Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>Visa</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle">
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->nationality }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'No Active'}}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('checkout_remove', $detail->id) }}">
                                                <img src="{{ url('frontend/images/exit_btn.png') }}" alt="exitbtn">
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">
                                                No Visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form  class="form-inline" method="POST" action="{{ route('checkout_create', $item->id) }}">
                            @csrf
                                <label for="username" class="sr-only">Name</label>
                                <input type="text" name="username" required class="form-control mb-3 mr-sm-2" id="username" placeholder="Username">
                                <label for="nationality" class="sr-only">nationality</label>
                                <input type="text" name="nationality" required class="form-control mb-3 mr-sm-2" style="width: 100px" id="nationality" placeholder="nationality">
                                <label for="is_visa" class="sr-only">Visa</label>
                                <select name="is_visa" id="is_visa" required class="custom-select mb-3 mr-sm-2">
                                    <option value="" selected>VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>
                                <label for="doe_passport" class="sr-only">DOE Passport</label>
                                <div class="input-group mb-3 mr-sm-2">
                                    <input type="text" class="form-control datepicker" id="doePassport" name="doe_passport" placeholder="DOE" style="width: 70px">
                                </div>
                                <button type="submit" class="btn btn-add-now mb-3 px-4">Add Now</button>
                            </form>
                            <h3 class="mt-3 mb-0">Noted</h3>
                            <p class="disclaimer mb-0">You are only able to invite member that has registered in
                                nomads</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Informations</h2>
                        <table class="trip-information mt-3">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">
                                    {{ $item->details->count() }} Person
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Additional visa</th>
                                <td width="50%" class="text-right">
                                    ${{ $item->additional_visa }},00
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">
                                    ${{ $item->travel_package->price }},00 / Person
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Total Price</th>
                                <td width="50%" class="text-right">
                                    ${{ $item->transaction_total }},00
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Total Pay (Unique Code)</th>
                                <td width="50%" class="text-right text-total">
                                    <span class="text-blue">${{ $item->transaction_total }},</span>
                                <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payments</h2>
                        <p class="payment">Please confirm the payment before you
                            continue trip</p>
                        <div class="bank">
                            <div class="bank-item pb-2">
                                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="bank" class="bank-images">
                                <div class="descript">
                                    <h3>Nomads ID</h3>
                                    <p>Bank Central Asia
                                        <br>
                                        0829 0999 8390
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-2">
                                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="bank" class="bank-images">
                                <div class="descript">
                                    <h3>Nomads ID</h3>
                                    <p>Bank Rakyat Indonesia
                                        <br>
                                        0829 0999 8390
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout_success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                            I HAVE PAID
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main content ends -->
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/combined/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/combined/js/gijgo.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="frontend/images/datepicker.png" />'
            }
        })
    });
</script>
</script>
@endpush