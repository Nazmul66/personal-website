<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.pages.profile.index', compact('roles'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function profileEdit()
    {
        return view('admin.pages.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        // dd($request->all());

        $user_id = Auth::user()->id;
        $user = Admin::where('id', $user_id)->first();
        $this->validate($request, [
            'name'  => 'required',
            'email'   => 'required|unique:admins,email,' . $user->id . ',id',
        ]);

        try {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->hasFile('image')) {

                // Delete the existing image file if it exists
                if( !empty($user->image) && file_exists($user->image)){
                    @unlink($user->image);
                }

                // Upload and save the new image
                $image = $request->file('image');
                $base_name  = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                $base_name  = explode(' ', $base_name);
                $base_name  = implode('-', $base_name);
                $base_name  = Str::lower($base_name);
                $image_name = $base_name . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                $extension  = $image->getClientOriginalExtension();
                $file_path  = 'adminpanel/images/';
                $image->move(public_path($file_path), $image_name);
                $user->image  = $file_path . '/' . $image_name;

            }

            $user->save();
        } catch (\Exception $e) {
            Toastr::error(trans('An unexpected error occured while updating profile information'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        Toastr::success(trans('Profile information updated successfully'), trans('Success'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ]);

        try {
            $user  = Admin::find(Auth::user()->id);
            $user->password = Hash::make($request->input('password'));
            $user->update();

        } catch (\Exception $e) {
            Toastr::error(trans('An unexpected error occured while updating password'), trans('Error'), ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        Toastr::success(trans('Password updated successfully'), trans('Success'), ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
