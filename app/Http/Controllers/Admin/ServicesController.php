<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allservices()
    {
        $services  = CustomerService::all();
        return view('admin.services.all-services', compact('services'));
    }
    public function createservice()
    {
        return view('admin.services.create-service');
    }
    public function editservice($slug)
    {
        $service = CustomerService::where('slug', $slug)->first();
        if ($service) {

            return view('admin.services.edit-service', compact('service'));
        } else {

            Toastr::error('Service  details not found', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allservices');
        }
    }
    public function deleteservice($slug)
    {
        $service = CustomerService::where('slug', $slug)->first();
        if ($service) {
            Storage::delete('public/services/' . $service->image);
            $service->delete();
            Toastr::success('Service  details deleted successfully.', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allservices');
         } else {

            Toastr::error('Service  details not found', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allservices');
        }
    }
    public function storeservice(Request $request)
    {
        $this->validate($request, [
            'service_title' => 'required|string',
            'description' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:3078',
        ]);
        $timenows = time();
        $checknums = "1234567898746351937463790";
        $checkstrings = "QWERTYUIOPLKJHGFDSAZXCVBNMmanskqpwolesurte191827273jkskalqKNJAHSGETWIOWKSNXJNEUDNEKDKSMKIDNUENDNXKSKEJNEJHCBRFGEWVJHBKWJEBFRNKWJENFECKWLERKJFNRKEHBJWEiwjWSIWMSWISWQOQOAWSAMJENEJEEDEWSSRFRFTHUJOKMNZBXVCX";
        $checktimelengths = 6;
        $checksnumlengths = 6;
        $checkstringlength = 3;
        $randnums = substr(str_shuffle($timenows), 0, $checktimelengths);
        $randstrings = substr(str_shuffle($checknums), 0, $checksnumlengths);
        $randcheckstrings = substr(str_shuffle($checkstrings), 0, $checkstringlength);
        $totalstrings = str_shuffle($randcheckstrings . "" . $randnums . "" . $randstrings);

        $new = new CustomerService;
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('services', $filenameToStore, 'public');
        $new->image = $filenameToStore;
        $new->title = $request->service_title;
        $new->description = $request->description;
        $new->slug = $totalstrings;
        $new->save();

        Toastr::success('Service Created successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('allservices');
    }
    public function updateeservice(Request $request, $slug)
    {
        $this->validate($request, [
            'service_title' => 'required|string',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:3078',
        ]);

        $new = CustomerService::where('slug', $slug)->first();
        if ($new) {
            if ($request->hasFile('picture')) {
                Storage::delete('public/services/' . $new->image);
                $fileNameWithExt = $request->picture->getClientOriginalName();
                $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $Extension = $request->picture->getClientOriginalExtension();
                $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
                $path = $request->picture->storeAs('services', $filenameToStore, 'public');
                $new->image = $filenameToStore;
            }

            $new->title = $request->service_title;
            $new->description = $request->description;
            $new->save();

            Toastr::success('Service updated successfully', 'Success', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allservices');
        } else {
            Toastr::error('Service details not found.', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('allservices');
        }
    }
}
