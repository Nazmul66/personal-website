<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CounterController extends Controller
{
    protected $counter;
    public $user;

    public function __construct(Counter $counter)
    {
        $this->counter     = $counter;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.banner.index')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Manage Counter Section";
        $data['row'] = Counter::first();
        return view('admin.pages.counter.index', $data);
    }


    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.banner.index')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd($request->all());

        $request->validate([
            'team_name'            => 'required',
            'team_count'           => 'required',
            'team_icon'            => 'required',
            'team_icon_bg'         => 'required',
            'project_name'         => 'required',
            'project_icon'         => 'required',
            'project_count'        => 'required',
            'project_icon_bg'      => 'required',
            'review_name'          => 'required',
            'review_count'         => 'required',
            'review_icon'          => 'required',
            'review_icon_bg'       => 'required',
        ]);

        DB::beginTransaction();
        try {
            $counter                        = Counter::findOrFail($id);

            $counter->team_name             = $request->team_name;
            $counter->team_count            = $request->team_count;
            $counter->team_icon             = $request->team_icon;
            $counter->team_icon_bg          = $request->team_icon_bg;
            $counter->project_name          = $request->project_name;
            $counter->project_icon          = $request->project_icon;
            $counter->project_count         = $request->project_count;
            $counter->project_icon_bg       = $request->project_icon_bg;
            $counter->review_name           = $request->review_name;
            $counter->review_count          = $request->review_count;
            $counter->review_icon           = $request->review_icon;
            $counter->review_icon_bg        = $request->review_icon_bg;
            $counter->is_active             = $request->is_active;

            $counter->save();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("Counter section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Counter section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
