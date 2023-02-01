<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $limit = $request->input('limit', 6);
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = product::with('Galleris')->find($id);

            if ($product) {
                return ResponseFormatter::success($product, 'Data berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data tidak ada', 400);
            }
        }

        if ($slug) {
            $product = product::with('Galleris')->where('slug', $slug)->first();

            if ($product) {
                return ResponseFormatter::success($product, 'Data berhasil diambil');
            } else {
                return ResponseFormatter::error(null, 'Data tidak ada', 400);
            }
        }

        $product = product::with('Galleris');

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }
        if ($type) {
            $product->where('type', 'like', '%' . $type . '%');
        }
        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $product->where('price', '<=', $price_to);
        }

        return ResponseFormatter::success($product->paginate($limit), 'List data berhasil diambil');
    }
}
