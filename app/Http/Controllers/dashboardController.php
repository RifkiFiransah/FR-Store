<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = transaction::where('transaction_status', 'SUCCESS')->count();
        $items = transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => transaction::where('transaction_status', 'PENDING')->count(),
            'success' => transaction::where('transaction_status', 'SUCCESS')->count(),
            'failed' => transaction::where('transaction_status', 'FAILED')->count(),
        ];

        return view('pages.dashboard', [
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
        ]);
    }
}
