<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    protected $category;
    public $user;

    public function __construct(BlogCategory $category)
    {
        $this->category     = $category;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Manage Blog Category List";
        $data['rows'] = BlogCategory::orderBy('id', 'asc')->get();
        return view('admin.pages.blogs_category.index', $data);
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
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'name' => 'required|max:191|unique:blogs_category,name',
        ]);

        DB::beginTransaction();
        try {
            $category                = new BlogCategory();

            $category->name          = $request->name;
            $category->slug          = Str::slug($request->name);
            $category->status        = $request->status;
            $category->save();

        }
        catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Toastr::error('Blog Category create error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success('Blog Category create successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.blogs_category.index');
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
        if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:191|unique:blogs_category,name,'. $id,
        ]);

        DB::beginTransaction();
        try {
            $category                = BlogCategory::findOrFail($id);

            $category->name          = $request->name;
            $category->slug          = Str::slug($request->name);
            $category->save();
        }
        catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Toastr::error('Blog Category Update error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }

        DB::commit();
        Toastr::success('Blog Category Update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.blogs_category.index');
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
        if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $category = BlogCategory::findOrFail($id);
        $category->delete();

        Toastr::success('Blog Category delete successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function toggleStatus(Request $request)
    {
        $row = BlogCategory::find($request->id);
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
    public function updateOrder(Request $request)
    {
        $data = $request->all();

        foreach ($data as $row) {
            DB::transaction(function () use ($row) {
                $category = BlogCategory::where('id', $row['id'])->first();
                if ($category) {
                    $category->save();
                } else {
                    Toastr::error('Blog Category order number not change', 'Error', ["positionClass" => "toast-top-right"]);
                }
            });
        }

        return response()->json(['success' => true]);
    }

}
