<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_galleri extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
