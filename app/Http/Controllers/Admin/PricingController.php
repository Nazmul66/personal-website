<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Pricing;
use App\Models\PricingFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    protected $plan;
    public $user;

    public function __construct(Pricing $plan)
    {
        $this->plan     = $plan;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Manage Pricing Package List';
        $data['plans'] = Pricing::orderBy('order_number', 'desc')->get();
        // dd($data['plans']);
        return view('admin.pages.pricing.index', $data);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $data['title'] = "Create Pricing Package";
        return view('admin.pages.pricing.create', $data);
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'frequency' => 'required',
            'text_link_name' => 'required',
            'word_limit' => 'required',
            'image_limit' => 'required',
            'minute_limit' => 'required',
            'character_limit' => 'required',
            'page_limit' => 'required',
            'chatbot_limit' => 'required',
            'feature_name' => 'required|array',
            'feature_name.*' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            if($request->frequency == '1'){
                $duration = '30';
            }else{
                $duration = '365';
            }

            $plan                   = new Pricing();
            $plan->title            = $request->title;
            $plan->price            = $request->price;
            $plan->frequency        = $request->frequency;
            $plan->text_link_name   = $request->text_link_name;
            $plan->duration         = $duration;
            $plan->status           = $request->status;
            $plan->is_special       = $request->is_special ? '1' : '0';
            $plan->word_limit       = $request->word_limit;
            $plan->image_limit      = $request->image_limit;
            $plan->minute_limit     = $request->minute_limit;
            $plan->character_limit  = $request->character_limit;
            $plan->page_limit       = $request->page_limit;
            $plan->chatbot_limit    = $request->chatbot_limit;
            $plan->order_number     = $request->order_number ?? Pricing::max('order_number') + 1;
            $plan->save();

            if ($request->has('feature_name') || $request->has('feature_name_de')) {
                $featureNames = $request->input('feature_name');

                foreach ($featureNames as $index => $featureName) {
                    $feature               = new PricingFeature();
                    $feature->pricing_id   = $plan->id;
                    $feature->feature_name = $featureName;
                    $feature->save();
                }
            }

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error('Pricing create error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success('Pricing created successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.pricing.index');
    }


    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Update Pricing Package";
        $data['pricing'] = Pricing::find($id);
        return view('admin.pages.pricing.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $request->validate([
           'title' => 'required',
            'price' => 'required',
            'frequency' => 'required',
            'text_link_name' => 'required',
            'feature_name' => 'required|array',
            'word_limit' => 'required',
            'image_limit' => 'required',
            'minute_limit' => 'required',
            'character_limit' => 'required',
            'page_limit' => 'required',
            'chatbot_limit' => 'required',
            'feature_name.*' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            if($request->frequency == '1'){
                $duration = '30';
            }else{
                $duration = '365';
            }
            $plan                   = Pricing::findOrFail($id);
            $plan->title            = $request->title;
            $plan->price            = $request->price;
            $plan->frequency        = $request->frequency;
            $plan->text_link_name   = $request->text_link_name;
            $plan->duration         = $duration;
            $plan->status           = $request->status;
            $plan->is_special       = $request->has('is_special') ? $request->is_special : 0;
            $plan->word_limit       = $request->word_limit;
            $plan->image_limit      = $request->image_limit;
            $plan->minute_limit     = $request->minute_limit;
            $plan->character_limit  = $request->character_limit;
            $plan->page_limit       = $request->page_limit;
            $plan->chatbot_limit    = $request->chatbot_limit;
            $plan->order_number     = $request->order_number;
            $plan->save();

            PricingFeature::where('pricing_id', $id)->delete();

            if ($request->has('feature_name') || $request->has('feature_name_de')) {
                $featureNames = $request->input('feature_name');

                foreach ($featureNames as $index => $featureName) {
                    $feature               = new PricingFeature();
                    $feature->pricing_id   = $plan->id;
                    $feature->feature_name = $featureName;
                    $feature->save();
                }
            }

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error('Pricing update error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success('Pricing updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.pricing.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        try {
            $pricing = Pricing::with('features')->find($id);
            if (!$pricing) {
                return redirect()->route('admin.pricing.index')->with('error', 'Pricing record not found.');
            }
            $pricing->features()->delete();
            $pricing->delete();

        } catch (\Throwable $th) {
            //throw $th;
            Toastr::error('Pricing delete error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        Toastr::success('Pricing Deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function view($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.view')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "View Pricing Package";
        $data['pricing'] = Pricing::find($id);
        return view('admin.pages.pricing.view', $data);
    }
    public function duplicate($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.plan.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $originalPlan = Pricing::findOrFail($id);

        $newPlan = $originalPlan->replicate();
        $newPlan->title = $originalPlan->title . ' (Duplicate)';
        $newPlan->order_number = Pricing::max('order_number') + 1;
        $newPlan->save();

        // Duplicate associated features
        foreach ($originalPlan->features as $originalFeature) {
            $newFeature = $originalFeature->replicate();
            $newFeature->pricing_id = $newPlan->id; // Associate with the new plan
            $newFeature->save();
        }

        // Redirect back with a success message
        Toastr::success('Pricing Deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.pricing.index');
    }

    public function toggleStatus(Request $request)
    {
        $row = Pricing::find($request->id);
        if ($row) {
            $row->status = $request->status;
            $row->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully!'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to update status.'
        ], 400);
    }
}
