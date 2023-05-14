@extends('Admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Suppliers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card-body ">

        <form method="POST" action="{{ route('products.update', $product->id) }}" class="row g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}"
                    required>
                <div class="invalid-feedback">Please, enter product name!</div>
            </div>

            <div class="clo-12">
                <label class="form-label">Category</label>
                <div class="col-12">
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}"
                    min="1" step="0.5" required>
                <div class="invalid-feedback">Please, enter product price!</div>
            </div>

            <div class="col-12">
                <label for="image" class="form-label">Image</label>
                <div class="input-group has-validation">
                    <input type="file" name="image" class="form-control" id="image" required>
                    <div class="invalid-feedback">Please chose product image. </div>
                </div>
            </div>

            <div class="col-12">
                <label for="descreption" class="form-label">Descreption</label>
                <input type="text" name="descreption" class="form-control" id="descreption"
                    value="{{ $product->descreption }}" required>
                <div class="invalid-feedback">Please, enter product desc!</div>
            </div>

            <div class="col-12">
                <label for="offers" class="form-label">Offers</label>
                <input type="number" name="offers" class="form-control" id="offers" value="{{ $product->offers }}">
            </div>

            <div class="col-12">
                <label for="sales" class="form-label">Sales</label>
                <input type="number" name="sales" class="form-control" id="sales" value="{{ $product->sales }}">
            </div>

            <div class="col-12">
                <label for="origin" class="form-label">Origin</label>
                <input type="text" name="origin" class="form-control" id="origin" value="{{ $product->origin }}"
                    required>
                <div class="invalid-feedback">Please, enter product origin!</div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-10" type="submit">Add</button>
            </div>

        </form>
    </div>
@endsection
