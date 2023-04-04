@extends('layouts.main')
@section('title', 'All Visitors')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Driving Customers</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Driving Customers</h5>
                        <p>All Driving customers details are listed here</p>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable" style="font-size:12px;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Car</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">ID Number</th>
                                        <th scope="col">Plate Number</th>
                                        <th scope="col">License Number</th>
                                        <th scope="col">Visitors</th>
                                        <th scope="col">Time In</th>
                                        <th scope="col">Time Out</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Date Visited</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $customer)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td><img src="{{ asset('storage/visitors/' . $customer->car_photo) }}"
                                                    style="height:50px;width:50px;border-radius:50%;" alt=""></td>
                                            <td>{{ ucwords($customer->name) }}</td>
                                            <td>{{ ucwords($customer->phone_number) }}</td>
                                            <td>{{ $customer->id_number }}</td>
                                            <td>{{ $customer->plate_number }}</td>
                                            <td>{{ $customer->license_number }}</td>
                                            <td>{{ $customer->total_members }}</td>
                                            <td>{{ $customer->time_in }}</td>
                                            <td>
                                                @if (empty($customer->time_out))
                                                    ---
                                                @else
                                                    {{ $customer->time_out }}
                                                @endif
                                            </td>
                                            <td>{{ ucwords($customer->category) }}</td>
                                            <td>{{ $customer->created_at->format('M, d Y') }}</td>
                                            <td>
                                                @if (empty($customer->time_out))
                                                    <a href="{{ route('editdrivingvisitor', $customer->slug) }}"
                                                        class="text-warning text-sm">Edit</a>
                                                    <a href="{{ route('deletedrivingvisitor', $customer->slug) }}"
                                                        class="text-xs text-danger">Delete</a>
                                                    <a href="{{ route('editdrivingvisitorcheckout', $customer->slug) }}"
                                                        class="text-success text-sm"
                                                        onclick="return confirm('Check Out this visitor?')">Check Out</a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
