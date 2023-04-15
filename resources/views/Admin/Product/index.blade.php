@extends('Admin.layout')


@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div>

    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Desc.</th>
                <th scope="col">Offers</th>
                <th scope="col">Sales</th>
                <th scope="col">Origin</th>
                <th scope="col" colspan="2">Operations</th>
            </tr>
        </thead>
        <tbody>
            @php
                $producrCounter = 0;
            @endphp
            @foreach ($products as $p)
                <tr>
                    <th scope="row">{{ ++$producrCounter }}</th>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->price }}</td>
                    <td><img src="{{ asset('Products_Images/' . $p->image) }}" width="50px" height="50px" alt="prod-img">
                    </td>
                    <td>{{ $p->descreption }}</td>
                    <td>{{ $p->offers }}</td>
                    <td>{{ $p->sales }}</td>
                    <td>{{ $p->origin }}</td>
                    <td><a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST">
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
