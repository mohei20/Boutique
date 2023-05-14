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
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Supplier</th>
                <th scope="col">Edit</th>
                <th scope="col">Delet</th>
            </tr>
        </thead>
        <tbody>
            @php
                $categoryCounter = 0;
            @endphp
            @foreach ($categories as $c)
                <tr>
                    <th scope="row">{{ ++$categoryCounter }}</th>
                    <td>{{ $c->name }}</td>
                    <td><img src="{{ asset('Categories_Images/' . $c->image) }}" width="100px" height="100px"
                            alt="cat-img"></td>
                    <td>{{ $c->supplier->name }}</td>
                    <td><a href="{{ route('categories.edit', $c->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('categories.destroy', $c->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
