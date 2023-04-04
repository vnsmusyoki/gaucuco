<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

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
}
