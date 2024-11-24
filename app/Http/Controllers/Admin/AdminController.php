<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\User\UpdateUser;
use App\Actions\User\CreateUser;
use App\Models\Admin;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // All Users
    public function index(Request $request)
    {
        $rows = Admin::latest()->get();
        $roles = Role::latest()->get();
        return view('admin.pages.admin.admins.index', compact('rows', 'roles'));
    }


    public function create(Request $request)
    {
        // $settings = Setting::where('status', 1)->first();
        // $config = DB::table('config')->get();
        $roles = Role::latest()->get();
        return view('admin.pages.admin.admins.create',compact('roles'));
    }

    public function store(Admin $user, StoreUserRequest $request)
    {

        DB::beginTransaction();
        try {
        CreateUser::create($request);
        Toastr::success(trans('Admin created Successfully!'), 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
         dd($th);
        Toastr::error(trans('An unexpected error occured while creating an Admin'), 'Error', ["positionClass" => "toast-top-right"]);
        DB::rollBack();
        return back();
        }

        DB::commit();
        return redirect()->route('admin.admin.index');
    }


    // public function store(StoreUserRequest $request)
    // {

    //     // dd(CreateUser::create($request));

    //     DB::beginTransaction();
    //     try {

    //         CreateUser::create($request);
    //         Toastr::success(trans('Admin created Successfully!'), 'Success', ["positionClass" => "toast-top-right"]);
    //     }
    //     catch (\Throwable $th) {
    //         DB::rollBack();
    //          throw $th;
    //         Toastr::error(trans('An unexpected error occured while creating an Admin'), 'Error', ["positionClass" => "toast-top-right"]);
    //         return back();
    //     }

    //     DB::commit();
    //     return redirect()->route('admin.admin.index');
    // }

    public function edit($id)
    {
        $row = Admin::find($id);

        return view('admin.pages.admin.admins.edit', [
            'row' => $row,
            'roles' => Role::latest()->get()
        ]);
    }

    public function passwordEdit($id)
    {
        $user = Admin::find($id);

        return view('admin.users.password', [
            'user' => $user,
        ]);
    }

    public function passwordUpdate($id, Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to update users.');
        // }
        $this->validate($request, [

            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
        ]);

        DB::beginTransaction();
        try {
            $user = Admin::find($id);

            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            Toastr::success('Password updated successfully', 'Success', ["positionClass" => "toast-top-center"]);
        } catch (\Throwable $th) {
            // dd($th);
            Toastr::error('An unexpected error occured while change password an Admin', 'Error', ["positionClass" => "toast-top-right"]);
            DB::rollBack();
            return back();
        }

        DB::commit();
        return redirect()->route('admin.admin.index');
    }

    public function update($id, UpdateUserRequest $request)
    {

        // dd($request->all());
        // if (is_null($this->user) || !$this->user->can('admin.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to update users.');
        // }

        DB::beginTransaction();
        try {
            $user = Admin::find($id);

            UpdateUser::update($request, $user);


            Toastr::success('Admin updated Successfully!', 'Success', ["positionClass" => "toast-top-center"]);
        } catch (\Throwable $th) {
            dd($th);
            Toastr::error('An unexpected error occured while update an Admin', 'Error', ["positionClass" => "toast-top-right"]);
            DB::rollBack();
            return back();
        }

        DB::commit();
        return redirect()->route('admin.admin.index');
    }
    public function sessionView($id)
    {
        $data['title'] = "Session History";
        $data['rows'] = Admin::with('sessionHistories')->find($id);
        return view('admin.pages.admin.admins.viewsession', $data);
    }
}
