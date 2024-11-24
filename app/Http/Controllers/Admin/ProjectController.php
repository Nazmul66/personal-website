<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected $project;
    public $user;

    public function __construct(Project $project)
    {
        $this->project     = $project;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.promotions.index')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title']    = "Manage Project Section";
        $data['section']  = HomePage::where('url_slug', 'project-section')->first();
        $data['rows']     = Project::orderBy('id', 'asc')->get();
        return view('admin.pages.projects.index', $data);
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }
        $data['title'] = "Create Projects";
        return view('admin.pages.projects.create', $data);
    }

    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'name'          => 'required|max:155|unique:portfolios,name',
            'url_link'      => 'required|url',
            'image'         => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $project                   = new Project();

            $project->name             = $request->name;
            $project->url_link         = $request->url_link;
            $project->status           = $request->status;

            if( $request->hasFile('image') ){
                $images = $request->file('image');
                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/projects/';
                $images->move($imagePath, $imageName);
                $project->image        =  $imagePath . $imageName;
            }
            $project->save();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Toastr::error("Projects Create Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Projects Create Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.projects.index');
    }


    public function edit($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $data['title'] = "Update projects";
        $data['row'] = Project::findOrFail($id);
        return view('admin.pages.projects.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $request->validate([
            'name'          => 'required|max:155|unique:portfolios,name,'. $id,
            'url_link'      => 'required|url',
            'image'         => 'image|mimes:png,jpg,jpeg,webp',
        ]);

        DB::beginTransaction();
        try {
            $project                   = Project::findOrFail($id);

            $project->name             = $request->name;
            $project->url_link         = $request->url_link;
            $project->status           = $request->status;

            if( $request->hasFile('image') ){
                $images = $request->file('image');

                if( !empty($project->image) && file_exists($project->image) ){
                    unlink($project->image);
                }

                $imageName          =  rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
                $imagePath          = 'adminPanel/images/projects/';
                $images->move($imagePath, $imageName);
                $project->image        =  $imagePath . $imageName;
            }
            $project->save();
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Toastr::error("Projects Update Error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Projects Update Successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.projects.index');
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
            'content'     => 'required',
        ]);

        DB::beginTransaction();

        try {
            $homePage                   = HomePage::findOrFail($id);
            $homePage->title            = $request->title;
            $homePage->subtitle         = $request->subtitle;
            $homePage->content          = $request->content;
            $homePage->is_active        = $request->is_active;
            $homePage->save();

        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            Toastr::error("Project section updated error", 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success("Project section updated successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // if (is_null($this->user) || !$this->user->can('admin.faq.delete')) {
        //     abort(403, 'Sorry !! You are Unauthorized.');
        // }

        $project = Project::findOrFail($id);

        if( !empty($project->image) && file_exists($project->image) ){
            @unlink($project->image);
        }

        $project->delete();

        Toastr::success("Project deleted successfully", 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
