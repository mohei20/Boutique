@extends('layouts.layout')

@section('title')
    Cart
@endsection

@section('name')
    Cart
@endsection

@section('content')
    <div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                        <table class="table text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Product</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Price</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Quantity</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Subtotal</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase"></strong></th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <th class="ps-0 py-3 border-light" scope="row">
                                                <div class="d-flex align-items-center"><a
                                                        class="reset-anchor d-block animsition-link" href="#">
                                                        <img src="{{ asset('Products_images/' . $details['image']) }}"
                                                            alt="..." width="70" />
                                                    </a>
                                                    <div class="ms-3"><strong
                                                            class="h6">{{ $details['name'] }}</strong></div>
                                                </div>
                                            </th>
                                            <td data-th="Price" class="p-3 align-middle border-light">
                                                <p class="mb-0 small">${{ $details['price'] }}</p>
                                            </td>
                                            <td data-th="Quantity" class="p-3 align-middle border-light">
                                                <input type="number" value="{{ $details['quantity'] }}"
                                                    class="form-control quantity update-cart" />
                                            </td>
                                            <td data-th="Subtotal" class="p-3 align-middle border-light">
                                                <p class="mb-0 small">${{ $details['price'] * $details['quantity'] }}</p>
                                            </td>
                                            <td class="p-3 align-middle border-light" class="actions" data-th="">
                                                <button class="btn  btn-sm remove-from-cart"><i
                                                        class="fas fa-trash-alt  text-muted"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- CART NAV-->
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm"
                                    href="{{ route('home') }}"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue
                                    shopping</a>
                            </div>
                            <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm"
                                    href="{{ route('purchase') }}">Procceed to checkout<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Cart total</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                        class="text-uppercase small font-weight-bold">Total</strong><span>${{ $total }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
