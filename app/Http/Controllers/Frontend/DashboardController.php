<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\Transaction;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public function plansBilling()
    {
        $data['planMonthly'] = Pricing::where('frequency', '1')->where('status', '1')->orderBy('order_number', 'asc')->get();
        $data['planYear'] = Pricing::where('frequency', '2')->where('status', '1')->orderBy('order_number', 'asc')->get();
        return view('dashboard/plansBilling', $data);
    }
    public function showCheckout($planId)
    {
        $data['plan'] = Pricing::with('features')->findOrFail($planId);
        return view('dashboard/checkout', $data);
    }

    public function profileDetails()
    {
        $data['user'] = Auth::user();
        return view('dashboard/profileDetails', $data);
    }
    public function transactions()
    {
        $user = Auth::user();
        $data['transactions'] = Transaction::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('dashboard/transaction', $data);
    }
    public function viewInvoice($trx_id)
    {
        $data['setting'] = getSetting();
        $data['row'] = Transaction::with('plan', 'user')->where('transaction_id', $trx_id)->first();
        // dd($data['row']);
        return view('dashboard/invoiceview', $data);
    }

    public function invoiceDownload($trx_id)
    {
        $setting = getSetting();
        $row = Transaction::with('plan', 'user')->where('transaction_id', $trx_id)->first();
        // return view('dashboard.invoicepdf', compact('row', 'setting'));
        // Load the view and pass the order data
        $pdf = PDF::loadView('dashboard.invoicepdf', compact('row', 'setting'));

        // Return the PDF as a download
        return $pdf->download('invoice_' . $row->transaction_id . '.pdf');
    }

    public function profileUpdate(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('profileTabOpen', true);
        }

        try {

            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->bio = $request->bio;

            // if ($request->hasFile('image')) {

            //     if (File::exists(public_path($user->image))) {
            //         File::delete(public_path($user->image));
            //     }

            //     $image = $request->file('image');
            //     $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
            //     $base_name  = explode(' ', $base_name);
            //     $base_name  = implode('-', $base_name);
            //     $base_name  = Str::lower($base_name);
            //     $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
            //     $extension  = $image->getClientOriginalExtension();
            //     $file_path  = 'uploads/user';
            //     $image->move(public_path($file_path), $image_name);
            //     $user->image  = $file_path . '/' . $image_name;

            // }

            $user->save();
        } catch (\Exception $e) {
            Toastr::error(trans('An unexpected error occured while updating profile information'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('profileTabOpen', true);
        }

        Toastr::success(trans('Profile information updated successfully'), trans('Success'), ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('profileTabOpen', true);
    }
    public function passwordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('passwordTabOpen', true);
        }

        try {
            $user  = User::find(Auth::user()->id);

            if (!Hash::check($request->input('current_password'), $user->password)) {
                Toastr::error(trans('Current password does not match'), trans('Error'), ["positionClass" => "toast-top-right"]);
               return redirect()->back()->with('passwordTabOpen', true);
            }

            $user->password = Hash::make($request->input('password'));
            $user->update();

        } catch (\Exception $e) {
            Toastr::error(trans('An unexpected error occured while updating password'), trans('Error'), ["positionClass" => "toast-top-right"]);
           return redirect()->back()->with('passwordTabOpen', true);
        }
        Toastr::success(trans('Password updated successfully'), trans('Success'), ["positionClass" => "toast-top-right"]);
       return redirect()->back()->with('passwordTabOpen', true);
    }

    public function profileDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('delAccountTabOpen', true);
        }

        try {
            $user = User::where('id',Auth::id())->first();

            if (!Hash::check($request->password, $user->password)) {
                Toastr::error(trans('Password is incorrect. Please try again.'), trans('Error'), ["positionClass" => "toast-top-right"]);
                return redirect()->back()->with('delAccountTabOpen', true);
            }

            $user->delete();
            Auth::logout();

            toastr()->success('Your account has been successfully deleted.');
            return redirect('/');

        } catch (\Exception $e) {
            Toastr::error(trans('An error occurred while trying to delete your account.'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('delAccountTabOpen', true);
        }
    }

    // public function releaseNotes()
    // {
    //     return view('dashboard/releaseNotes');
    // }

    public function codeGenerator()
    {
        return view('generator/codeGenerator');
    }

    public function emailGenerator()
    {
        return view('generator/emailGenerator');
    }

    public function textGenerator()
    {
        return view('generator/textGenerator');
    }


    // public function appearance()
    // {
    //     return view('dashboard/appearance');
    // }

    // public function application()
    // {
    //     return view('dashboard/application');
    // }

    // public function chatExport()
    // {
    //     return view('dashboard/chatExport');
    // }

    // public function help()
    // {
    //     return view('dashboard/help');
    // }

    // public function notification()
    // {
    //     return view('dashboard/notification');
    // }

    // public function sessions()
    // {
    //     return view('dashboard/sessions');
    // }

    // public function imageEditor()
    // {
    //     return view('generator/imageEditor');
    // }

    // public function imageGenerator()
    // {
    //     return view('generator/imageGenerator');
    // }

    // public function vedioGenerator()
    // {
    //     return view('generator/vedioGenerator');
    // }
}
