@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Business Owners  </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $owners->count() }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Users </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$total }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Visitors </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $visitors}}</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <!-- Customers Card -->
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Available Rentals </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $rentals->count() }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Rentals</h5>

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

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
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

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->

                 

                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>
@endsection
