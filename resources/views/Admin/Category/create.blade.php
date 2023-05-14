@extends('Admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card-body ">

        <form method="POST" action="{{ route('categories.store') }}" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
                <div class="invalid-feedback">Please, enter category name!</div>
            </div>

            <div class="col-12">
                <label for="image" class="form-label">Image</label>
                <div class="input-group has-validation">
                    <input type="file" name="image" class="form-control" id="image" required>
                    <div class="invalid-feedback">Please chose category image. </div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">Supplier</label>
                <div class="col-12">
                    <select class="form-select" aria-label="Default select" name="supplier_id" id="supplier">
                        <option disabled selected>Choose Supplier</option>
                        @foreach ($supplier as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-10" type="submit">Add</button>
            </div>

        </form>
    </div>
@endsection
