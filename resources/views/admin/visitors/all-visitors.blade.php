@extends('layouts.main')
@section('title', 'All Visitors')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Walk In Customers</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All WalkIn Customers</h5>
                        <p>All walkin customers details are listed here</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Time In</th>
                                    <th scope="col">Time Out</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Date Visited</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ ucwords($customer->name) }}</td>
                                        <td>{{ ucwords($customer->phone_number) }}</td>
                                        <td>{{ $customer->id_number }}</td>
                                        <td>{{ $customer->time_in }}</td>
                                        <td>
                                            @if (empty($customer->time_out))
                                                ---
                                            @else
                                                {{ $customer->time_out }}
                                            @endif
                                        </td>
                                        <td>{{ ucwords($customer->visiting_reason) }}</td>
                                        <td>{{ $customer->created_at->format('M, d Y') }}</td>

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
