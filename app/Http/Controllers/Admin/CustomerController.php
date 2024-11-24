<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\User;
use App\Models\UserPlans;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;
    public $user;

    public function __construct(User $customer)
    {
        $this->customer     = $customer;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $data['title'] = "Manage Customer List";
        $data['rows'] = User::get();
        $data['plans'] = Pricing::where('status', '1')->get();
        return view('admin.pages.customer.index', compact('data'));
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Edit Customer List";
        $data['user'] = User::find($id);
        return view('admin.pages.customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }


        $customer = User::find($id);
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'           => 'required|max:100',
                'email'         => 'required|unique:users,email,'. $customer->id,
            ]);

            $customer->name          = $request->name;
            $customer->last_name     = $request->last_name;
            $customer->email         = $request->email;
            $customer->save();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error('Failed to update customer', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success('Customer Update successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }
    public function sessionView($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.view')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Session History";
        $data['rows'] = User::with('sessionHistories')->find($id);
        return view('admin.pages.customer.viewsession', $data);
    }

    public function fetchSubscriptionModal($id)
    {
        $user = User::with('userPlan')->findOrFail($id);
        $plans = Pricing::where('status', '1')->get();

        $html = view('admin.pages.customer.subscriprion', compact('user', 'plans'))->render();

        return response()->json(['html' => $html]);
    }

    public function assignPricing(Request $request)
    {
        $this->validate($request, [
            'plan_id'           => 'exists:pricings,id',
        ]);
        DB::beginTransaction();
        try {
            $plan = Pricing::find($request->plan_id);

            $user = User::findOrFail($request->user_id);

            $user->current_pan_id          = $request->plan_id;
            $user->current_pan_expire_date = date('Y-m-d', strtotime('+' . $plan->duration . ' days'));
            $user->save();

            $userPlan = new UserPlans();
            $userPlan->user_id        = $request->user_id;
            $userPlan->plan_id        = $plan->id;
            $userPlan->plan_duration  = $plan->duration;
            $userPlan->expired_date   = date('Y-m-d', strtotime('+' . $plan->duration . ' days'));
            $userPlan->is_admin       = '1';
            $userPlan->admin_id       = auth()->user()->id;
            $userPlan->save();


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Toastr::error('Failed to update customer Pricing', 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success('Customer Update successfully', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }

}
