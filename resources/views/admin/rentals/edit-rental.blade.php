@extends('layouts.main')
@section('title', 'Edit Rental Details')
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
                        <h5 class="card-title">Upload New Rental</h5>
                        <form method="POST" action="{{ route('updaterental', $rental->slug)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Room Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="room_name" value="{{ucwords($rental->name)}}">
                                    @error('room_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Amount Per Day/ Night</label>
                                <div class="col-sm-10">
                                    <input type="number" min="10" class="form-control" name="amount" value="{{ $rental->amount}}">
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Recommended   Capacity</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" class="form-control" name="capacity" value="{{ $rental->capacity}}">
                                    @error('capacity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="picture">
                                    @error('picture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Room Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="description" >{{ $rental->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Room Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="room_category">
                                        <option value="">click to select </option>
                                        <option value="Studio">Studio</option>
                                        <option value="Town House">Town House</option>
                                        <option value="Cabin">Cabin</option>
                                    </select>
                                    <small class="text-success">Selected - {{ $rental->category }}</small>
                                    @error('room_category')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Action</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Register Rental</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>

@endsection
