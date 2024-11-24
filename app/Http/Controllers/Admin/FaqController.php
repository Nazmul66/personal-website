<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


class FaqController extends Controller
{
    protected $faq;
    public $user;

    public function __construct(Faq $faq)
    {
        $this->faq     = $faq;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.faq.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Manage Faq List";
        $data['rows'] = Faq::orderBy('order_id', 'asc')->get();
        return view('admin.pages.faq.index', $data);
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
        if (is_null($this->user) || !$this->user->can('admin.faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $request->validate([
            'question' => 'required|max:191|unique:faqs,question',
            'answer' => 'required|max:512',
        ]);

        DB::beginTransaction();
        try {
            $faq                     = new Faq();

            $faq->question           = $request->question;
            $faq->answer             = $request->answer;
            $faq->status             = $request->status;
            $faq->order_id           = Faq::max('order_id') ? Faq::max('order_id') + 1 : 1;
            $faq->save();

        }
        catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Toastr::error('Faq create error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        DB::commit();
        Toastr::success('Faq create successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.faq.index');
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
            'question' => 'required|max:191|unique:faqs,question,' . $id,
            'answer' => 'required|max:512',
            'order_id' => 'required|integer|unique:faqs,order_id,' . $id,
        ]);

        DB::beginTransaction();
        try {
            $faq                     =  Faq::findOrFail($id);

            $faq->question           = $request->question;
            $faq->answer             = $request->answer;
            $faq->status             = $request->status;
            $faq->order_id           = $request->order_id;
            $faq->update();
        }
        catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Toastr::error('Faq Update error', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }

        DB::commit();
        Toastr::success('Faq Update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.faq.index');
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

        $faq = Faq::findOrFail($id);
        $faq->delete();

        Toastr::success('Faq delete successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function toggleStatus(Request $request)
    {
        $row = Faq::find($request->id);
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
                $faq = Faq::where('id', $row['id'])->first();
                if ($faq) {
                    $faq->order_id = $row['order_id'];
                    $faq->save();
                } else {
                    Toastr::error('Faq order number not change', 'Error', ["positionClass" => "toast-top-right"]);
                }
            });
        }

        return response()->json(['success' => true]);
    }

}
