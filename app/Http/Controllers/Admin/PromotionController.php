<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    protected $content;
    public $user;

    public function __construct(Promotion $content)
    {
        $this->content     = $content;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.promotions.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Manage Promotion Section";
        $data['section'] = HomePage::where('url_slug', 'promotion-section')->first();
        $data['rows'] = Promotion::orderBy('order_id', 'asc')->get();
        return view('admin.pages.promotion_section.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title'] = "Create Promotions";
        return view('admin.pages.promotion_section.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'icon'   => 'required',
            'title'  => 'required|max:155|unique:promotions,title',
            'button_text' => 'required|max:128',
            'button_link' => 'required',
            'status' => 'required',
            'hot' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data                   = new Promotion();
            $data->title            = $request->title;
            $data->button_text      = $request->button_text;
            $data->button_link      = $request->button_link;

            if ($request->hot == 1) {
                Promotion::where('hot', 1)->update(['hot' => 0]);
            }

            $data->hot              = $request->hot;
            $data->status           = $request->status;
            $data->order_id         = Promotion::max('order_id') ? Promotion::max('order_id') + 1 : 1;

            if( $request->hasFile('icon') ){
                $images = $request->file('icon');
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/promotions/';
                $images->move($imagePath, $imageName);
                $data->icon        =  $imagePath . $imageName;
            }

            $data->save();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error("Promotion Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Promotion Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.promotions.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Update Promotions";
        $data['row'] = Promotion::findOrFail($id);
        return view('admin.pages.promotion_section.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'title'  => 'required|max:155|unique:promotions,title,'. $id,
            'button_text' => 'required|max:128',
            'button_link' => 'required',
            'order_id' => 'required|integer|unique:promotions,order_id,'. $id,
            'status' => 'required',
            'hot' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data                   = Promotion::findOrFail($id);

            $data->title            = $request->title;
            $data->button_text      = $request->button_text;
            $data->button_link      = $request->button_link;
            if ($request->hot == 1) {
                Promotion::where('hot', 1)->update(['hot' => 0]);
            }

            $data->hot              = $request->hot;
            $data->status           = $request->status;
            $data->order_id         = $request->order_id;

            if( $request->hasFile('icon') ){
                $images = $request->file('icon');
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/promotions/';
                $images->move($imagePath, $imageName);
                $data->icon        =  $imagePath . $imageName;
            }

            $data->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("Promotion Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Promotion Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.promotions.index');
    }

    public function sectionupdate(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd( $request->all());

        $request->validate([
            'header'      => 'required',
            'title'       => 'required',
            'content'     => 'required',
            'is_active'   => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->header;
            $homePage->subtitle         = $request->title;
            $homePage->content          = $request->content;
            $homePage->button_text      = $request->button_text;
            $homePage->button_link      = $request->button_link;
            $homePage->is_active        = $request->is_active;
            $homePage->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("Promotion section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Promotion section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $Content = Promotion::findOrFail($id);
        $Content->delete();

        Toastr::success("Promotion deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
