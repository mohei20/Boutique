@extends('layouts.layout')

@section('title')
    Order Checkout
@endsection

@section('name')
    Order Checkout
@endsection

@section('content')
    <div class="container">

        <section class="py-5">
            <!-- BILLING ADDRESS-->
            <h2 class="h5 text-uppercase mb-4">Billing details</h2>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row gy-3">
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                                <input class="form-control form-control-lg" type="tel" id="phone" name="phone"
                                    placeholder="e.g. +02 245354745">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="address">Address</label>
                                <input class="form-control form-control-lg" type="text" id="address" name="adress"
                                    placeholder="House number and street name">
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark" type="submit">Place order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ORDER SUMMARY-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Your order</h5>
                            <ul class="list-unstyled mb-0">
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <li class="d-flex align-items-center justify-content-between"><strong
                                                class="small fw-bold"> {{ $details['quantity'] }}
                                                {{ $details['name'] }}</strong><span
                                                class="text-muted small">${{ $details['price'] }}</span></li>
                                        <li class="border-bottom my-2"></li>
                                    @endforeach
                                    <li class="d-flex align-items-center justify-content-between"><strong
                                            class="text-uppercase small fw-bold">Total</strong><span>${{ $total }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
