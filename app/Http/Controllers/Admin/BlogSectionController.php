<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSection;
use App\Models\HomePage;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class BlogSectionController extends Controller
{
    protected $blog;
    public $user;

    public function __construct(BlogSection $blog)
    {
        $this->blog     = $blog;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.promotions.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title']       = "Manage Blog Section";
        $data['section']     = HomePage::where('url_slug', 'blog-section')->first();
        $data['rows']        = BlogSection::leftJoin('admins', 'admins.id', 'blogs.admin_id')
                                ->leftJoin('blogs_category', 'blogs_category.id', 'blogs.category_id')
                                ->select('blogs.*', 'blogs_category.name as blog_cat', 'admins.name as admin_name')
                                ->orderBy('id', 'asc')->get();
        return view('admin.pages.blogs.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title']       = "Create Blogs";
        $data['categories']  = BlogCategory::where('status', 1)->get();
        return view('admin.pages.blogs.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'title'         => 'required|max:155|unique:blogs,title',
            'image'         => 'required|image|mimes:png,jpg,jpeg,webp',
            'description'   => 'required',
        ]);

        DB::beginTransaction();
        try {
            $blog                   = new BlogSection();

            $blog->category_id      = $request->category_id;
            $blog->admin_id         = Auth::user()->id;
            $blog->comment_id       = $request->comment_id ?? 0;
            $blog->title            = $request->title;
            $blog->slug             = Str::slug($request->title);
            $blog->description      = $request->description;
            $blog->publish_date     = date('d M Y');
            $blog->status           = $request->status;
            $blog->meta_title       = $request->meta_title;
            $blog->meta_description = $request->meta_description;

            if( $request->hasFile('image') ){
                $images = $request->file('image');
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/blogs/';
                $images->move($imagePath, $imageName);
                $blog->image        =  $imagePath . $imageName;
            }
            $blog->save();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error("Blogs Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Blogs Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.blogs.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title']       = "Update blogs";
        $data['row']         = BlogSection::findOrFail($id);
        $data['categories']  = BlogCategory::where('status', 1)->get();
        return view('admin.pages.blogs.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd($request->all(),  $id);

        $request->validate([
            'title'         => 'required|max:155|unique:blogs,title,'. $id,
            'image'         => 'image|mimes:png,jpg,jpeg,webp',
            'description'   => 'required',
        ]);

        DB::beginTransaction();
        try {
            $blog                   = BlogSection::findOrFail($id);

            $blog->category_id      = $request->category_id;
            $blog->admin_id         = Auth::user()->id;
            $blog->comment_id       = $request->comment_id ?? 0;
            $blog->title            = $request->title;
            $blog->slug             = Str::slug($request->title);
            $blog->description      = $request->description;
            $blog->publish_date     = date('d M Y');
            $blog->status           = $request->status;
            $blog->meta_title       = $request->meta_title;
            $blog->meta_description = $request->meta_description;

            if( $request->hasFile('image') ){
                $images = $request->file('image');

                if( !empty($blog->image) && file_exists($blog->image) ){
                    unlink($blog->image);
                }

                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/blogs/';
                $images->move($imagePath, $imageName);
                $blog->image     =  $imagePath . $imageName;
            }
            $blog->save();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error("Blogs Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Blogs Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.blogs.index');
    }

    public function sectionupdate(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        // dd( $request->all());

        $request->validate([
            'title'       => 'required',
            'subtitle'    => 'required',
        ]);

        DB::beginTransaction();
        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->title;
            $homePage->subtitle         = $request->subtitle;
            $homePage->is_active        = $request->is_active;
            $homePage->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("Blog section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Blog section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $blog   =   BlogSection::findOrFail($id);

        if( !empty($blog->image) && file_exists($blog->image) ){
            @unlink($blog->image);
        }

        $blog->delete();

        Toastr::success("Blogs deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
