@extends('layouts.main')
@section('title', 'Create New Business Owner')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Business Owners</li>
                <li class="breadcrumb-item active">Uploading Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upload New Business Owner</h5>
                        <form method="POST" action="{{ route('storewatchmen')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="full_name">
                                    @error('full_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="number"  class="form-control" name="phone_number">
                                    @error('phone_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">ID Number</label>
                                <div class="col-sm-10">
                                    <input type="number"  class="form-control" name="id_number">
                                    @error('id_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Photo Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="picture">
                                    @error('picture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Action</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Business Owner</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>

@endsection
