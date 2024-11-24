<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transaction;
    public $user;

    public function __construct(Transaction $transaction)
    {
        $this->$transaction     = $transaction;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public  function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.transaction.list')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Transaction List";
        $data['transactions'] = Transaction::with('plan', 'user')->orderBy('id', 'desc')->get();
        // dd($data['transactions']);
        return view('admin.pages.transaction.index', $data);
    }
    public  function viewInvoice($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.transaction.view')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = "Invoice";
        $data['setting'] = getSetting();
        $data['row'] = Transaction::with('plan', 'user')->where('id', $id)->first();
        // dd($data['transactions']);
        return view('admin.pages.transaction.invoice', $data);
    }

    public function invoiceDownload($trx_id)
    {
        $setting = getSetting();
        $row = Transaction::with('plan', 'user')->where('transaction_id', $trx_id)->first();
        // return view('dashboard.invoicepdf', compact('row', 'setting'));
        // Load the view and pass the order data
        $pdf = PDF::loadView('dashboard.invoicepdf', compact('row', 'setting'));

        // Return the PDF as a download
        return $pdf->download('invoice_' . $row->transaction_id . '.pdf');
    }

    public function statusCancel($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.transaction.cancel')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $transaction = Transaction::find($id);
        if (!$transaction) {
            Toastr::error('Transaction not found', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.transaction.index');
        }

        try {
            if ($transaction->payment_status !== 'cancel') {
                $transaction->payment_status = 'cancel';
                $transaction->updated_by = auth()->user()->id;
                $transaction->save();

                Toastr::success('Transaction payment status changed successfully', 'Success', ["positionClass" => "toast-top-right"]);
            } else {
                Toastr::error('This transaction is already canceled', 'Error', ["positionClass" => "toast-top-right"]);
            }
        } catch (\Throwable $th) {
            Toastr::error('Something went wrong, please try again', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.transaction.index');
        }

        return redirect()->route('admin.transaction.index');
    }

    public function getTransactionStatistics()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $lastMonth = $currentMonth == 1 ? 12 : $currentMonth - 1; // Handle transition from January to December

        // Get the transaction totals for each month in the current year
        $transactions = DB::table('transactions')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(amount) as total'))
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Initialize data for both the pie chart and bar chart
        $data = [
            'months' => [],            // For bar chart
            'current_month' => 0,      // For pie chart (current month total)
            'last_month' => 0,        // For pie chart (last month total)
            'yearly' => 0,            // For pie chart (yearly total)
        ];

        // Initialize month data for bar chart (all months default to 0)
        for ($i = 1; $i <= 12; $i++) {
            $data['months'][$i] = 0;  // Default to 0 if no data exists for the month
        }

        // Process transactions for both charts
        foreach ($transactions as $transaction) {
            $data['months'][$transaction->month] = $transaction->total;

            // Check if the transaction is for the current month or last month and accumulate the totals
            if ($transaction->month == $currentMonth) {
                $data['current_month'] = $transaction->total;
            }

            if ($transaction->month == $lastMonth) {
                $data['last_month'] = $transaction->total;
            }

            // Accumulate yearly total
            $data['yearly'] += $transaction->total;
        }

        // Return the data as JSON
        return response()->json($data);
    }


    // public function getTransactionStatistics()
    // {
    //     $currentYear = Carbon::now()->year;

    //     // Get the transaction totals for each month in the current year
    //     $transactions = DB::table('transactions')
    //         ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(amount) as total'))
    //         ->whereYear('created_at', $currentYear)
    //         ->groupBy(DB::raw('MONTH(created_at)'))
    //         ->orderBy(DB::raw('MONTH(created_at)'))
    //         ->get();

    //     // Prepare data for response
    //     $data = [];
    //     for ($i = 1; $i <= 12; $i++) {
    //         // Initialize month data
    //         $data['months'][$i] = 0; // Default to 0 if no data exists for the month
    //     }

    //     foreach ($transactions as $transaction) {
    //         $data['months'][$transaction->month] = $transaction->total;
    //     }

    //     return response()->json($data);
    // }
}
