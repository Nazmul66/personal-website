<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    protected $brand;
    public $user;

    public function __construct(Brand $brand)
    {
        $this->brand     = $brand;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.brand.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Manage Brand List';
        $data['rows'] = Brand::orderBy('order_id','asc')->get();
        return view('admin.pages.brand.index', $data);
    }

    // public function create()
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }
    //     $data['title'] = __('messages.common.faq_create');
    //     return view('admin.faq.create');
    // }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.brand.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        // dd($request->all());

        $request->validate([
            'name' => 'required|max:155|unique:brands,name',
            'image' => 'required|max:256|image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $brand                     = new Brand();

            $brand->name               = $request->name;
            $brand->status             = $request->status;
            $brand->order_id           = Brand::max('order_id') ? Brand::max('order_id') + 1 : 1;

            if( $request->hasFile('image') ){
                $images = $request->file('image');

                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/brand/';
                $images->move($imagePath, $imageName);

                $brand->image        =  $imagePath . $imageName;
            }

            $brand->save();
        }
        catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error('Brand create error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success('Brand create successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.brand.index');
    }


    // public function edit($id)
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }

    //     $data['title'] = __('messages.common.faq_edit');
    //     $data['row'] = Faq::find($id);
    //     return view('admin.faq.edit', compact('data'));
    // }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.brand.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $request->validate([
            'name' => 'required|max:155|unique:brands,name,'. $id,
            'image' => 'max:256|image|mimes:png,jpg,jpeg,webp',
            'order_id' => 'required|integer|unique:brands,order_id,'. $id,
        ]);

        DB::beginTransaction();
        try {
            $brand                     = Brand::findOrFail($id);

            $brand->name               = $request->name;
            $brand->status             = $request->status;
            $brand->order_id           = $request->order_id;

            if( $request->hasFile('image') ){
                $images = $request->file('image');

                if( !empty($brand->image) && file_exists($brand->image) ){
                     @unlink($brand->image);
                }

                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/brand/';
                $images->move($imagePath, $imageName);

                $brand->image        =  $imagePath . $imageName;
            }

            $brand->update();
        }
        catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Toastr::error('Brand Update error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success('Brand Update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.brand.index');
    }


    // public function view($id)
    // {
    //     // if (is_null($this->user) || !$this->user->can('admin.faq.view')) {
    //     //     abort(403, 'Sorry !! You are Unauthorized.');
    //     // }

    //     $data['title'] = __('messages.common.faq_view');
    //     $data['row'] = Faq::find($id);

    //     return view('admin.faq.view', compact('data'));
    // }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.brand.destroy')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $brand = Brand::findOrFail($id);
        $brand->delete();

        Toastr::success("Brand Delete Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function toggleStatus(Request $request)
    {
        $row = Brand::find($request->id);
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
