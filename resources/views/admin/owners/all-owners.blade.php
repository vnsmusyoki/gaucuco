@extends('layouts.main')
@section('title', 'All Users')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Business Owners</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('createnewowner')}}" class="btn btn-success btn-sm">Create Business Owner</a>

            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All  Owners</h5>
                        <p>All Owners  details are listed here</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Date Onboarded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td><img src="{{ asset('storage/users/' . $user->image) }}"
                                            style="height:50px;width:50px;border-radius:50%;" alt=""></td>
                                        <td>{{ ucwords($user->name) }}</td>
                                        <td>{{ ucwords($user->phone_number) }}</td>
                                        <td>{{ $user->id_number }}</td>
                                        <td>{{ $user->created_at->format('M, d Y') }}</td>

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
