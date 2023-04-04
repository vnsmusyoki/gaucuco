@extends('layouts.main')
@section('title', 'All Rentals')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Customer Services</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Customer Services</h5>
                        <p>All Uploaded Customer Services will are listed here</p>
                        <div class="table-responsive" style="font-size:12px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td><img src="{{ asset('storage/services/' . $service->image) }}"
                                                    style="height:50px;width:50px;border-radius:50%;" alt=""></td>
                                            <td>{{ ucwords($service->title) }}</td>
                                            <td>
                                                {{ str_limit(strip_tags($service->description), 50) }}
                                                @if (strlen(strip_tags($service->description)) > 50) ..
                                                @endif
                                            </td>
                                            <td>{{ $service->created_at->format('M, d Y') }}</td>
                                            <td>
                                                <a href="{{ route('editservice', $service->slug) }}"
                                                    class="text-xs text-warning">Edit</a>
                                                <a href="{{ route('deleteservice', $service->slug) }}"
                                                    class="text-xs text-danger">Delete</a>
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
