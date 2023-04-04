@extends('layouts.main')
@section('title', 'All Rentals')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Rentals</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Rentals</h5>
                        <p>All Uploaded rentals will are listed here</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Capacity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $key => $rental)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td><img src="{{ asset('storage/rentals/' . $rental->image) }}"
                                                style="height:50px;width:50px;border-radius:50%;" alt=""></td>
                                        <td>{{ ucwords($rental->name) }}</td>
                                        <td>{{ ucwords($rental->category) }}</td>
                                        <td>$ {{ $rental->amount }}</td>
                                        <td>{{ $rental->capacity }}</td>
                                        <td>{{ ucwords($rental->status) }}</td>
                                        <td>{{ $rental->created_at->format('M, d Y') }}</td>
                                        <td>
                                            <a href="{{ route('editrental', $rental->slug)}}" class="btn btn-warning text-sm btn-sm">Edit</a>
                                            <a href="{{ route('deleterental', $rental->slug)}}" class="btn btn-danger text-sm btn-sm">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
