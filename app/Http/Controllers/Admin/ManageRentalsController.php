<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HouseRental;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ManageRentalsController extends Controller
{
    public function allrentals()
    {
        $rentals = HouseRental::all();
        return view('admin.rentals.all-rentals', compact('rentals'));
    }
    public function createrental()
    {
        return view('admin.rentals.create-rental');
    }
    public function storerental(Request $request)
    {
        $this->validate($request, [
            'room_name' => 'required|string',
            'amount' => 'required|numeric|min:10',
            'capacity' => 'required|numeric|min:1',
            'description' => 'required|string',
            'room_category' => 'required',
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:3078',
        ]);
        $timenows = time();
        $checknums = "1234567898746351937463790";
        $checkstrings = "QWERTYUIOPLKJHGFDSAZXCVBNMmanskqpwolesurte191827273jkskalqKNJAHSGETWIOWKSNXJNEUDNEKDKSMKIDNUENDNXKSKEJNEJHCBRFGEWVJHBKWJEBFRNKWJENFECKWLERKJFNRKEHBJWEiwjWSIWMSWISWQOQOAWSAMJENEJEEDEWSSRFRFTHUJOKMNZBXVCX";
        $checktimelengths = 6;
        $checksnumlengths = 6;
        $checkstringlength = 2;
        $randnums = substr(str_shuffle($timenows), 0, $checktimelengths);
        $randstrings = substr(str_shuffle($checknums), 0, $checksnumlengths);
        $randcheckstrings = substr(str_shuffle($checkstrings), 0, $checkstringlength);
        $totalstrings = str_shuffle($randcheckstrings . "" . $randnums . "" . $randstrings);


        $new = new HouseRental;
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('rentals', $filenameToStore, 'public');
        $new->photo = $filenameToStore;
        $new->name = $request->room_name;
        $new->category = $request->room_category;
        $new->slug = $totalstrings;
        $new->amount = $request->amount;
        $new->status = "available";
        $new->capacity = $request->capacity;
        $new->description = $request->description;
        $new->save();

        Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->route('allrentals');
    }
}
