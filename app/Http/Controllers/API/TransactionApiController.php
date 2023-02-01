<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionApiController extends Controller
{
    public function getTransaction($id)
    {
        $transaction = transaction::with('detail.product')->find($id);
        if ($transaction) {
            return ResponseFormatter::success($transaction, 'Data berhasil diambil');
        } else {
            return ResponseFormatter::error(null, 'Data gagal diambil', 400);
        }
    }
}
