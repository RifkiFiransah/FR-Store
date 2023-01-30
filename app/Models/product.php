<?php

namespace App\Models;

use App\Models\product_galleri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function Galleris()
    {
        return $this->hasMany(product_galleri::class, 'product_id');
    }
}
