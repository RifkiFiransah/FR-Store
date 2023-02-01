<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CheckoutRequest;
use App\Models\product;
use App\Models\transaction;
use App\Models\transaction_detail;
use Illuminate\Http\Request;

class CheckoutApiController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TFR' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = transaction::create($data);
        // dd($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new transaction_detail([
                'transaction_id' => $transaction->id,
                'product_id' => $product
            ]);
            product::find($product)->decrement('quantity');
        }

        $transaction->detail()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
