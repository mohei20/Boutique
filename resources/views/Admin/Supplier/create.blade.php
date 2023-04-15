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

        <form method="POST" action="{{ route('suppliers.store') }}" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
                <div class="invalid-feedback">Please, enter supplier name!</div>
            </div>

            <div class="col-12">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control" id="phone" required>
                <div class="invalid-feedback">Please, enter phone number!</div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-10" type="submit">Add</button>
            </div>

        </form>
    </div>
@endsection
