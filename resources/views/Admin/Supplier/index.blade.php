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

    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Edit</th>
                <th scope="col">Delet</th>
            </tr>
        </thead>
        <tbody>
            @php
                $supplierCounter = 0;
            @endphp
            @foreach ($suppliers as $s)
                <tr>
                    <th scope="row">{{ ++$supplierCounter }}</th>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->phone }}</td>
                    <td><a href="{{ route('suppliers.edit', $s->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('suppliers.destroy', $s->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                {{-- </tr> --}}
            @endforeach
        </tbody>
    </table>
@endsection
