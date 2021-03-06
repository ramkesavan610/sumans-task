<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::Class);
    }

}
