@extends('layouts.main')
@section('title', 'Create Driving Visitor')
@section('content')

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Visitors</li>
                <li class="breadcrumb-item active">Uploading Driving Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upload New Driving Customer</h5>
                        <form method="POST" action="{{ route('storedrivingvisitor')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Driver Full Name</label>
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
                                <label for="inputEmail" class="col-sm-2 col-form-label">License Number</label>
                                <div class="col-sm-10">
                                    <input type="number"  class="form-control" name="license_number">
                                    @error('license_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Plate Number</label>
                                <div class="col-sm-10">
                                    <input type="number"  class="form-control" name="plate_number">
                                    @error('plate_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Car Photo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="picture">
                                    @error('picture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Visitor Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="visiting_customer_category">
                                        <option value="">click to select </option>
                                        <option value="Short Term Visitor">Short Term Visitor</option>
                                        <option value="Long Term Visitor">Long Term Visitor</option>
                                    </select>
                                    @error('visiting_customer_category')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Total Members</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" class="form-control" name="total_numbers">
                                    @error('total_numbers')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Visiting Reason </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="visiting_reason"></textarea>
                                    @error('visiting_reason')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Action</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Driving Visitor</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>

@endsection
