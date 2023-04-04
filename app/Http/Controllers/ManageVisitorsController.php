<?php

namespace App\Http\Controllers;

use App\Models\DrivingVisitor;
use App\Models\WalkininCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ManageVisitorsController extends Controller
{
    public function allvisitors()
    {
        $customers = WalkininCustomer::orderBy('created_at', 'desc')->get();
        return view('admin.visitors.all-visitors', compact('customers'));
    }
    public function createvisitor()
    {
        return view('admin.visitors.create-visitor');
    }
    public function createdrivingvisitor()
    {
        return view('admin.visitors.create-driving-visitor');
    }
    public function editvisitor($slug){
        $visitor = WalkininCustomer::where('slug', $slug)->first();
        if($visitor){
            return view('admin.visitors.edit-visitor', compact('visitor'));
        }else{
            Toastr::success('Walk In Customer details not found', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allvisitors');
        }
    }
    public function storevisitor(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'phone_number' => 'required|digits:10',
            'id_number' => 'required|digits:8',
            'license_number' => 'required|string:8',
            'plate_number' => 'required|string:8',
            'total_numbers' => 'required|numeric|min:1',
            'visiting_reason' => 'required|string',
            'visiting_customer_category' => 'required|string',
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


        $new = new DrivingVisitor;
        $new->name = $request->full_name;
        $new->id_number = $request->id_number;
        $new->phone_number = $request->phone_number;
        $new->visiting_reason = $request->visiting_reason;
        $new->plate_number = $request->plate_number;
        $new->category = $request->visiting_customer_category;
        $new->total_members = $request->total_numbers;
        $new->license_number = $request->license_number;
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '-' . auth()->user()->id . '.' . $Extension;
        $path = $request->picture->storeAs('visitors', $filenameToStore, 'public');
        $new->car_photo = $filenameToStore;
        $new->slug = $totalstrings;
        $new->time_in = Carbon::now();
        $new->save();

        Toastr::success('visitor created successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('allvisitors');
    }

    public function alldrivingvisitors()
    {
        $customers = DrivingVisitor::all();
        return view('admin.visitors.all-driving-visitors', compact('customers'));
    }
    public function editdrivingvisitor($driverslug)
    {
        $driver = DrivingVisitor::where('slug', $driverslug)->first();
        if ($driver) {
            return view('admin.visitors.edit-driving-visitor', compact('driver'));
        } else {
            Toastr::error('visitor details not found', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allvisitors');
        }
    }
    public function updatedrivingvisitor(Request $request, $driverslug)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'phone_number' => 'required|digits:10',
            'id_number' => 'required|digits:8',
            'license_number' => 'required|string:8',
            'plate_number' => 'required|string:8',
            'total_numbers' => 'required|numeric|min:1',
            'visiting_reason' => 'required|string',
            'visiting_customer_category' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:3078',
        ]);

        $new = DrivingVisitor::where('slug', $driverslug)->first();
        if ($new) {
            $new->name = $request->full_name;
            $new->id_number = $request->id_number;
            $new->phone_number = $request->phone_number;
            $new->visiting_reason = $request->visiting_reason;
            $new->plate_number = $request->plate_number;
            $new->category = $request->visiting_customer_category;
            $new->total_members = $request->total_numbers;
            $new->license_number = $request->license_number;
            if ($request->hasFile('picture')) {
                Storage::delete('public/visitors/' . $new->car_photo);
                $fileNameWithExt = $request->picture->getClientOriginalName();
                $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $Extension = $request->picture->getClientOriginalExtension();
                $filenameToStore = $fileName . '-' . auth()->user()->id . '.' . $Extension;
                $path = $request->picture->storeAs('visitors', $filenameToStore, 'public');
                $new->car_photo = $filenameToStore;
            }

            $new->save();

            Toastr::success('visitor updated successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allvisitors');
        } else {
            Toastr::success('Failed to update visitors record', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allvisitors');
        }
    }
    public function deletedrivingvisitor($driverslug)
    {
        $driver = DrivingVisitor::where('slug', $driverslug)->first();
        if ($driver) {
            Storage::delete('public/visitors/' . $driver->car_photo);
            $driver->delete();
            Toastr::success('visitor deleted successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allvisitors');
        } else {
            Toastr::error('Visitor details not found', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allvisitors');
        }
    }
}
