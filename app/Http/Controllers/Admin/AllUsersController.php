<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\User;
use App\Models\Watchmen;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AllUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function watchmen()
    {
        $users  = Watchmen::all();

        return view('admin.watchmen.all-users', compact('users'));
    }
    public function createwatchmen()
    {

        return view('admin.watchmen.create-user');
    }
    public function storewatchmen(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'phone_number' => 'required|digits:10',
            'id_number' => 'required|digits:8',
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


        $new = new Watchmen();
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('users', $filenameToStore, 'public');
        $new->image = $filenameToStore;
        $new->name = $request->full_name;
        $new->slug = $totalstrings;
        $new->phone_number = $request->phone_number;
        $new->id_number = $request->id_number;
        $new->save();

        Toastr::success('New Watchman created Successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('watchmen');
    }

    public function allowners()
    {
        $users  = Owner::all();
        return view('admin.owners.all-owners', compact('users'));
    }
    public function createnewowner()
    {
        return view('admin.owners.create-owner');
    }
    public function storebusinessowner(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'phone_number' => 'required|digits:10',
            'id_number' => 'required|digits:8',
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


        $new = new Owner();
        $fileNameWithExt = $request->picture->getClientOriginalName();
        $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $Extension = $request->picture->getClientOriginalExtension();
        $filenameToStore = $fileName . '-' . time() . '.' . $Extension;
        $path = $request->picture->storeAs('users', $filenameToStore, 'public');
        $new->image = $filenameToStore;
        $new->name = $request->full_name;
        $new->slug = $totalstrings;
        $new->phone_number = $request->phone_number;
        $new->id_number = $request->id_number;
        $new->save();

        Toastr::success('New Business Owner created Successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('allowners');
    }

    public function profile()
    {
        return view('admin.my-profile');
    }
    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        Toastr::success('Account password updated successfully.', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
