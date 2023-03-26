@extends('layouts.layout')

@section('title')
    Home
@endsection

@section('name')
    Shop
@endsection

@section('content')
    <section class="py-6">
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong
                            class="small text-uppercase fw-bold">Categories</strong></div>
                    <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                        @foreach ($categories as $c)
                            <li class="mb-2"><a class="reset-anchor"
                                    href="{{ route('show-category', $c->id) }}">{{ $c->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="row">
                            <!-- PRODUCT-->
                            @foreach ($products as $p)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product text-center">
                                        <div class="mb-3 position-relative">
                                            <div class="badge text-white bg-"></div><a class="d-block" href="#"><img
                                                    class="img-fluid w-100"
                                                    src="{{ asset('Products_images/' . $p->image) }}" alt="..."></a>
                                            <div class="product-overlay">
                                                <ul class="mb-0 list-inline">
                                                    <li class="list-inline-item m-0 p-0"><a
                                                            class="btn btn-sm btn-outline-dark" href="#!"><i
                                                                class="far fa-heart"></i></a></li>
                                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                            href="#">Add to cart</a></li>
                                                    <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                            href="#productView" data-bs-toggle="modal"><i
                                                                class="fas fa-expand"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6> <a class="reset-anchor" href="#">{{ $p->name }}</a></h6>
                                        <p class="small text-muted">{{ $p->price }}$</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- PAGINATION-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center ">
                                {{ $products->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
    </section>
@endsection
